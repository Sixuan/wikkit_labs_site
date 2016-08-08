<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller
{
    /**
     * 返回错误说明
     * error:返回数据有误
     * error2:非法图片或者图片超过1M
     */
    private $url = 'http://120.76.26.101:8081/faceApi/detect?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
    private $matching_url = 'http://120.76.26.101:8081/faceApi/matching?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';

    public function index()
    {

        $this->load->view('demo/index');
    }

    public function demo2()
    {
        $this->load->view('demo/demo2');
    }

    /**
     * Demo1
     */
    public function demo1()
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
            $data = array('image' => new CURLFile(realpath($file_path)));
        } else {
            $data = array('image' => '@' . realpath($file_path));
        }
        $data = $this->upload_file($this->url, $data);
        //echo $data;

        //对象转数组
        $result = $this->objectToArray(json_decode($data));
        //服务端那边出错了
        if (!empty($result['status']) && $result['status'] == 'socket_error') {
            unlink($file_path);
            $data = array(
                "status" => "error"
            );
            echo json_encode($data);
            exit();
        }
        $result['img_path'] = 'http://120.76.26.101:8081' . $result['img_path'];
        //根据坐标生成小脸
        foreach ($result['faces'] as $key => $value) {
            $faceurl = $this->getface($key,$face_name, $value['top'], $value['right'], $value['bottom'], $value['left']);
            $result['faces'][$key]['faceurl'] = base_url('upload/face/') . '/' . $faceurl;
        }
        unlink($file_path);
        echo json_encode($result);
    }

    public function result()
    {
        $face_path = $this->config->item('face_path');
        $da[] = $_POST['img1'];
        $da[] = $_POST['img2'];
        $file_path_1 = $face_path.'/'.$_POST['img1'];
        $file_path_2 = $face_path.'/'.$_POST['img2'];
        //php5.5或以上使用CURLFile，以下使用@
        if (class_exists('CURLFile')) {
            $data = array(
                'image1' => new CURLFile(realpath($file_path_1)),
                'image2' => new CURLFile(realpath($file_path_2))
            );
        } else {
            $data = array(
                'image1' => '@' . realpath($file_path_1),
                'image2' => '@' . realpath($file_path_2)
            );
        }
        //提交数据
        $data = $this->upload_file($this->matching_url, $data);
        //对象转数组
        $result = $this->objectToArray(json_decode($data));

        $result_new = array();
        $result_new = $result;
        $pio = array();
        foreach ($result['images'] as $key => $value) {
            foreach ($value['faces'] as $k => $v) {
                //截图
                $faceurl = $this->getface($key . '_' . $k, $da[$key], $v['top'], $v['right'], $v['bottom'], $v['left']);
                $pio[] = $faceurl;
            }
        }

        if (!empty($result['facePairs'])) {
            foreach ($result['facePairs'] as $key => $value) {
                foreach ($value['pair'] as $k => $v) {
                    //将每张小图的url放进去
                    $result['facePairs'][$key]['imgurl'][$k] = base_url('upload/face/') . '/' . $pio[$v];
                }
            }
        }

        echo json_encode($result);

    }

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

    //根据坐标生成头像
    public function getface($key = "0", $imgurl, $top, $right, $bottom, $left)
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

    //现在还用不到，压缩图片的
    function image_png_size_add($imgurl)
    {
        $face_path = $this->config->item('face_path');
        $imgsrc = $face_path . $imgurl;
        $imgdst = time() . '.jpg';

        list($width, $height, $type) = getimagesize($imgsrc);
        $new_width = $width * 0.5;
        $new_height = $height * 0.5;
        switch ($type) {
            case 1:
                $giftype = $this->check_gifcartoon($imgsrc);
                if ($giftype) {
                    header('Content-Type:image/gif');
                    $image_wp = imagecreatetruecolor($new_width, $new_height);
                    $image = imagecreatefromgif($imgsrc);
                    imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($image_wp, $imgdst, 75);
                    imagedestroy($image_wp);
                }
                break;
            case 2:
                header('Content-Type:image/jpeg');
                $image_wp = imagecreatetruecolor($new_width, $new_height);
                $image = imagecreatefromjpeg($imgsrc);
                imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($image_wp, $imgdst, 75);
                imagedestroy($image_wp);
                break;
            case 3:
                header('Content-Type:image/png');
                $image_wp = imagecreatetruecolor($new_width, $new_height);
                $image = imagecreatefrompng($imgsrc);
                imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($image_wp, $imgdst, 75);
                imagedestroy($image_wp);
                break;
        }
    }

    //检测gif
    function check_gifcartoon($image_file)
    {
        $fp = fopen($image_file, 'rb');
        $image_head = fread($fp, 1024);
        fclose($fp);
        return preg_match("/" . chr(0x21) . chr(0xff) . chr(0x0b) . 'NETSCAPE2.0' . "/", $image_head) ? false : true;
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
