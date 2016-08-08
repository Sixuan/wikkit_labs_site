<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Face extends CI_Controller
{

    /**
     * 图片上传
     * url:http://localhost/wikkit_labs_site/index.php/api/imageUpload
     */
    private $url = 'http://120.76.26.101:8081/faceApi/detect?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';

    public function imageUpload()
    {
        if(empty($_FILES['files'])){
            $data = $this->Msg('404','image miss');
            echo $data;
            exit();
        }

        $allowedExts = array("gif", "jpeg", "jpg", "png");

        $temp = explode(".", $_FILES['files']["name"]);
        $extension = end($temp);     // 获取文件后缀名

        //判断图片是否查过尺寸已经更换图片名称
        if ((($_FILES['files']["type"] == "image/gif")
                || ($_FILES['files']["type"] == "image/jpeg")
                || ($_FILES['files']["type"] == "image/jpg")
                || ($_FILES['files']["type"] == "image/pjpeg")
                || ($_FILES['files']["type"] == "image/x-png")
                || ($_FILES['files']["type"] == "image/png"))
            && ($_FILES['files']["size"] < 1048576)   // 小于 1 M
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES['files']["error"] > 0) {
                $data = $this->Msg('404','error');
                echo $data;
                exit();
            } else {
                $_FILES['files']["name"] = time() . '.' . $extension;
            }
        } else {
            $data = $this->Msg('404','image big');
            echo $data;
            exit();
        }

        //提交数据
        if (class_exists('CURLFile')) {
            $data = array(
                'image' => new CURLFile(realpath($tmpfile = $_FILES['files']['tmp_name'])),
            );
        } else {
            $data = array(
                'image' => '@' . realpath($tmpfile = $_FILES['files']['tmp_name']),
            );
        }

        $result = $this->upload_file($this->url, $data);
        $data = $this->Msg('200','success', $result);
        echo $data;
        exit();
    }

    public function Msg($code = '200' ,$msg = 'success' , $data=array()) {
        $result['code'] = $code;
        $result['msg'] = $msg;
        $result['data'] = $data;
        echo urldecode(json_encode( $result ));
        exit ();
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
}