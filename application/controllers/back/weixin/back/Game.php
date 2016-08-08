<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	private $url = 'http://120.76.26.101:8081/faceApi/detect?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
	private $matching_url = 'http://120.76.26.101:8081/faceApi/matching?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
	
	//颜值排名 start 
	public function index()
	{
		echo '1';
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
		$this->load->view('weixin/rank_3');
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
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		for ($i=0; $i < 2; $i++) { 
			$temp = explode(".", $_FILES["file"]["name"][$i]);
			$extension = end($temp);     // 获取文件后缀名
			if ((($_FILES["file"]["type"][$i] == "image/gif")
			|| ($_FILES["file"]["type"][$i] == "image/jpeg")
			|| ($_FILES["file"]["type"][$i] == "image/jpg")
			|| ($_FILES["file"]["type"][$i] == "image/pjpeg")
			|| ($_FILES["file"]["type"][$i] == "image/x-png")
			|| ($_FILES["file"]["type"][$i] == "image/png"))
			&& ($_FILES["file"]["size"][$i] < 204800)   // 小于 200 kb
			&& in_array($extension, $allowedExts))
			{
				if ($_FILES["file"]["error"][$i] > 0)
				{
					echo 'error';//上传失败
				}
				else
				{
					$_FILES["file"]["name"][$i] = time().'_'.$i.'.'.$extension;
				}
			}
			else
			{
				echo "非法的文件格式";
			}

		}
		if (class_exists('CURLFile')) {
            $data = array(
            	'image1' => new CURLFile(realpath($tmpfile = $_FILES['file']['tmp_name'][0])),
            	'image2' => new CURLFile(realpath($tmpfile = $_FILES['file']['tmp_name'][1]))
            );
        } else {
            $data = array(
            	'image1' => '@' . realpath($tmpfile = $_FILES['file']['tmp_name'][0]),
            	'image1' => '@' . realpath($tmpfile = $_FILES['file']['tmp_name'][1])
            );
        }
        $data = $this->upload_file($this->matching_url,$data);
        $result = $this->objectToArray(json_decode($data));
        $data_new = array(
        	'img_url_1' => 'http://120.76.26.101:8081'.$result['images'][0]['img_path'],
        	'img_url_2' => 'http://120.76.26.101:8081'.$result['images'][1]['img_path'],
        	'similarity' => $result['facePairs'][0]['similarity']
        );
        $this->load->view('weixin/hlike_3',$data_new);
	}
	//有多像 end
	
	//curl数据
	function upload_file($url,$data){
        
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
   //对象转数组
	public function objectToArray($obj){  
	    $ret = array();  
	    foreach ($obj as $key => $value) {  
		    if (gettype($value) == "array" || gettype($value) == "object"){  
		            $ret[$key] = $this->objectToArray($value);  
		    }else{  
		        $ret[$key] = $value;  
		    }  
	    }  
	    return $ret;  
	}
}
