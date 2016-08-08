<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $url = 'http://120.76.26.101:8081/faceApi/detect?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}

	public function upload()
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);

		$extension = end($temp);     // 获取文件后缀名
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
		&& in_array($extension, $allowedExts))
		{
			if ($_FILES["file"]["error"] > 0)
			{
				echo 'error';//上传失败
			}
			else
			{
				$_FILES["file"]["name"] = time().'.'.$extension;

				/*echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
				echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
				echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";*/
					
				
				$tmpname = $_FILES['file']['name'];
		        $tmpfile = $_FILES['file']['tmp_name'];
		        $tmpType = $_FILES['file']['type'];
		        $data = $this->upload_file($this->url,$tmpname,$tmpfile,$tmpType);
				var_dump($data);
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
				$imgurl = base_url('upload').'/' . $_FILES["file"]["name"];
				echo $imgurl;
			}
		}
		else
		{
			echo "非法的文件格式";
		}
	}

	function upload_file($url,$filename,$path,$type){
        if (class_exists('CURLFile')) {
            $data = array('image' => new CURLFile(realpath($path)));
        } else {
            $data = array('image' => '@' . realpath($path));
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return_data = curl_exec($ch);
        curl_close($ch);
        return $return_data;

   }
}
