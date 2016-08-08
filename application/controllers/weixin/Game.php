<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
class Game extends CI_Controller
{
    /**
     * 返回错误说明
     * error:返回数据有误
     * error2:非法图片或者图片超过1M
     */
    private $url = 'http://120.76.26.101:8081/faceApi/detect?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
    private $matching_url = 'http://120.76.26.101:8081/faceApi/matching?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
    private $recognizeurl = 'http://120.76.26.101:8081/faceApi/recognize/7?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';

    //颜值排名 start
    public function index()
    {

    }

    public function rank()
    {
        $this->load->view('weixin/rank');
    }

    public function rank_2()
    {
        $this->load->view('weixin/rank_2');
    }

    public function rank_3()
    {

        $str = $_POST['img'];
        $type = $_POST['type'];

        switch($type){
            case 'image/png':
                $ext='.png';
                break;
            case 'image/jpeg';
                $ext='.jpeg';
                break;
            case 'image/jpeg':
                $ext='.jpg';
                break;
            case 'image/bmp':
                $ext='.bmp';
                break;
            default:
                $ext='.jpg';
        }

        $face_path = $this->config->item('face_path');
        $face_name=time().$ext;
        $file_path=$face_path.'/'.$face_name;

        if(!file_exists(dirname($file_path))){
            mkdir(dirname($file_path),0777,true);
        }
        $img_content = str_replace('data:'.$type.';base64,','',$str);
        $img_content = base64_decode($img_content);
        $result =file_put_contents($file_path,$img_content);




        if (class_exists('CURLFile')) {
            $data = array(
                'image' => new CURLFile(realpath($file_path))
            );
        } else {
            $data = array(
                'image' => '@' . realpath($file_path)
            );
        }

        $data = $this->upload_file($this->url, $data);
        $result = $this->objectToArray(json_decode($data));
        if (!empty($result['status']) && $result['status'] == 'socket_error') {
            $data = array(
                "status" => "error"
            );
            echo json_encode($data);
            exit();
        };

        $result['faces'] = $this->getRank($result['faces']);

        foreach ($result['faces'] as $key => $value) {
            $faceurl = $this->getsmallface($key, $face_name, $value['top'], $value['right'], $value['bottom'], $value['left']);
            $result['faces'][$key]['faceurl'] = base_url('upload/face/') . '/' . $faceurl;
        }

        echo json_encode($result);
        exit();
    }

    //排名
    private function getRank($data)
    {
        $result = array();
        //分数排名
        foreach ($data as $key => $value) {
            $face_score[] = $value['face_score'];
        }
        array_multisort($face_score, SORT_DESC);

        foreach ($face_score as $key => $value) {
            if ($key > 2) {
                break;
            }
            foreach ($data as $k => $v) {
                if ($v['face_score'] == $value) {
                    $result[] = $v;
                }
            }
        }
        return $result;
    }
    //颜值排名 end
    //明星脸 start
    public function star()
    {
        $this->load->view('weixin/star');
    }

    public function star_2()
    {
        $this->load->view('weixin/star_2');
    }

    public function star_3()
    {

        $str = $_POST['img'];
        $type = $_POST['type'];

        switch($type){
            case 'image/png':
                $ext='.png';
                break;
            case 'image/jpeg';
                $ext='.jpeg';
                break;
            case 'image/jpeg':
                $ext='.jpg';
                break;
            case 'image/bmp':
                $ext='.bmp';
                break;
            default:
                $ext='.jpg';
        }

        $face_path = $this->config->item('face_path');
        $file_path=$face_path.'/'.time().$ext;

        if(!file_exists(dirname($file_path))){
            mkdir(dirname($file_path),0777,true);
        }
        $img_content = str_replace('data:'.$type.';base64,','',$str);
        $img_content = base64_decode($img_content);
        $result =file_put_contents($file_path,$img_content);



        if (class_exists('CURLFile')) {
            $data = array(
                'image' => new CURLFile(realpath($file_path)),
            );
        } else {
            $data = array(
                'image' => '@' . realpath($file_path),
            );
        }
        $data = $this->upload_file($this->recognizeurl, $data);

        $result = $this->objectToArray(json_decode($data));
        //删除文件
        unlink($file_path);
        if (!empty($result['status']) && $result['status'] == 'socket_error') {
            $data = array(
                "status" => "error"
            );
            echo json_encode($data);
            exit();
        }else{
            if (!empty($result['errorcode']) && $result['errorcode'] == '400') {
                $data = array(
                    "status" => "error"
                );
                echo json_encode($data);
                exit();
            }else{
                foreach ($result['candidates'] as $key => $value) {
                    $data = $this->getface($value['person_id']);
                    $data = json_decode($data);
                    $data = $this->objectToArray($data);
                    //下载图片
                    $imgurl = $this->getImage("http://120.76.26.101:8081" . $data['person']['img_path']);
                    //截图
                    $result_url = $this->getsmallface($key = "0", $imgurl, $data['person']['top'], $data['person']['right'], $data['person']['bottom'], $data['person']['left']);

                    //放进数组
                    $result['candidates'][$key]['thumb_url'] = base_url('upload/face') . '/' . $result_url;
                }
                echo json_encode($result);
            }

        }

    }

    public function getface($person_id)
    {
        $url = "http://120.76.26.101:8081/faceApi/persons/" . $person_id . "?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return_data = curl_exec($ch);
        curl_close($ch);
        return $return_data;
    }
    //获取远程图片并把它保存到本地
    // $url 是远程图片的完整URL地址，不能为空。
    public function getImage($url)
    {
        if ($url == ""):return false;endif;
        $face_path = $this->config->item('face_path');
        $ext = strrchr($url, ".");
        $filename = date("dMYHis") . $ext;
        $filepath = $face_path . '/' . $filename;
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $fp2 = @fopen($filepath, "a");
        fwrite($fp2, $img);
        fclose($fp2);
        return $filename;
    }

    //根据坐标生成头像
    public function getsmallface($key, $imgurl, $top, $right, $bottom, $left)
    {
        $temp = explode(".", $imgurl);
        $extension = end($temp);
        $x = $left;
        $y = $top;
        $w = $right - $left;
        $h = $bottom - $top;

        $face_path = $this->config->item('face_path');
        $src = $face_path . '/' . $imgurl;
        //第一步，根据传来的宽，高参数创建一幅图片，然后正好将截取的部分真好填充到这个区域
        if ($extension == 'png') {
            header("Content-type: image/png");
            $target = @imagecreatetruecolor($w, $h) or die("Cannot Initialize new GD image stream");
            //第二步，根据路径获取到源图像,用源图像创建一个image对象
            $source = imagecreatefrompng($src);
        } else {
            header("Content-type: image/jpeg");
            $target = @imagecreatetruecolor($w, $h) or die("Cannot Initialize new GD image stream");
            //第二步，根据路径获取到源图像,用源图像创建一个image对象
            $source = imagecreatefromjpeg($src);
        }


        //第三步，根据传来的参数，选取源图像的一部分填充到第一步创建的图像中
        imagecopy($target, $source, 0, 0, $x, $y, $w, $h);

        //第四步,保存图像
        //截取并组织新路径
        $pos_path = strripos($src, "/");
        $newPath = substr($src, 0, $pos_path - strlen($src)) . "/face/";
        //截取并组织新名称
        $pos_name = strripos($imgurl, ".");
        $newName = substr($imgurl, 0, $pos_name);
        $pos_name_ = strripos($newName, "/");
        //这里暂时不加后缀“.jpg”，防止有重复的文件，如果有，需要重命名,加了后会不方便
        $newName = $key . '_' . $imgurl;
        //生成不带后缀的图片
        $file = $newPath . $newName;
        //如果目录存在
        if (is_dir($newPath)) {
            //创建文件
            imagejpeg($target, $file, 100);
        } else {
            //创建目录
            mkdir($newPath);
            //创建文件
            imagejpeg($target, $file, 100);
        }
        return $newName;
    }
    //明星脸 end
    //有多像 start
    public function hlike()
    {
        $this->load->view('weixin/hlike');
    }

    public function hlike_2()
    {
        $this->load->view('weixin/hlike_2');
    }

    public function hlike_3()
    {

       /* $allowedExts = array("gif", "jpeg", "jpg", "png");
        for ($i = 0; $i < 2; $i++) {
            $temp = explode(".", $_FILES["file"]["name"][$i]);
            $extension = end($temp);     // 获取文件后缀名
            if ((($_FILES["file"]["type"][$i] == "image/gif")
                    || ($_FILES["file"]["type"][$i] == "image/jpeg")
                    || ($_FILES["file"]["type"][$i] == "image/jpg")
                    || ($_FILES["file"]["type"][$i] == "image/pjpeg")
                    || ($_FILES["file"]["type"][$i] == "image/x-png")
                    || ($_FILES["file"]["type"][$i] == "image/png"))
                && ($_FILES["file"]["size"][$i] < 1048576)   // 小于 1M
                && in_array($extension, $allowedExts)
            ) {
                if ($_FILES["file"]["error"][$i] > 0) {
                    echo "<script>alert('请稍后重试或者换张新的图片)</script>";
                    echo "<script>window.location= '" . site_url("weixin/game/hlike") . "';</script>";
                    exit();
                } else {
                    $_FILES["file"]["name"][$i] = time() . '_' . $i . '.' . $extension;
                }
            } else {
                echo "<script>alert('非法格式或者图片大于1M')</script>";
                echo "<script>window.location= '" . site_url("weixin/game/hlike") . "';</script>";
                exit();
            }

        }*/
        $face_path = $this->config->item('face_path');
        $file_path_1 = $face_path.'/'.$_POST['img1'];
        $file_path_2 = $face_path.'/'.$_POST['img2'];
        if (class_exists('CURLFile')) {
            $data = array(
                'image1' => new CURLFile(realpath($file_path_1)),
                'image2' => new CURLFile(realpath($file_path_2))
            );
        } else {
            $data = array(
                'image1' => '@' . realpath($file_path_1),
                'image1' => '@' . realpath($file_path_2)
            );
        }
        $data = $this->upload_file($this->matching_url, $data);
        unlink($file_path_1);
        unlink($file_path_2);
        $result = $this->objectToArray(json_decode($data));
        if (!empty($result['status']) && $result['status'] == 'socket_error') {
            $data = array(
                "status" => "error"
            );
            echo json_encode($data);
            exit();
        }
        $data_new = array(
            'img_url_1' => 'http://120.76.26.101:8081' . $result['images'][0]['img_path'],
            'img_url_2' => 'http://120.76.26.101:8081' . $result['images'][1]['img_path'],
            'similarity' => $result['facePairs'] ? $result['facePairs'][0]['similarity'] : 0
        );
        $this->load->view('weixin/hlike_3', $data_new);
    }
    //有多像 end

    //curl数据
    function upload_file($url, $data)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return_data = curl_exec($ch);
        curl_close($ch);
        return $return_data;

    }

    //对象转数组
    public function objectToArray($obj)
    {
        $ret = array();
        foreach ($obj as $key => $value) {
            if (gettype($value) == "array" || gettype($value) == "object") {
                $ret[$key] = $this->objectToArray($value);
            } else {
                $ret[$key] = $value;
            }
        }
        return $ret;
    }

    public function downloadImg(){
        $str = $_POST['img'];
        $type = $_POST['type'];

        switch($type){
            case 'image/png':
                $ext='.png';
                break;
            case 'image/jpeg';
                $ext='.jpeg';
                break;
            case 'image/jpeg':
                $ext='.jpg';
                break;
            case 'image/bmp':
                $ext='.bmp';
                break;
            default:
                $ext='.jpg';
        }

        $face_path = $this->config->item('face_path');
        $face_name=time().$ext;
        $file_path = $face_path.'/'.$face_name;

        if(!file_exists(dirname($file_path))){
            mkdir(dirname($file_path),0777,true);
        }
        $img_content = str_replace('data:'.$type.';base64,','',$str);
        $img_content = base64_decode($img_content);
        $result =file_put_contents($file_path,$img_content);

        echo $face_name;
    }
}
