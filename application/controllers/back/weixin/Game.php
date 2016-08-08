<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

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

	public function star_3()
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
				$data=array(
					"status"=>"error"
				);
				echo json_encode($data);
				exit();
			}
			else
			{
				$_FILES["file"]["name"] = time().'.'.$extension;
			}
		}
		else
		{
			$data=array(
				"status"=>"error2"
			);
			echo json_encode($data);
			exit();
		}

		
		if (class_exists('CURLFile')) {
            $data = array(
            	'image' => new CURLFile(realpath($tmpfile = $_FILES['file']['tmp_name'])),
            );
        } else {
            $data = array(
            	'image' => '@' . realpath($tmpfile = $_FILES['file']['tmp_name']),
            );
        }
        $data = $this->upload_file($this->recognizeurl,$data);
        $result = $this->objectToArray(json_decode($data));
        foreach ($result['candidates'] as $key => $value) {
        	$data = $this->getface($value['person_id']);
        	$data=json_decode($data);
        	$data=$this->objectToArray($data);
        	//下载图片
			$imgurl = $this->getImage("http://120.76.26.101:8081".$data['person']['img_path']);
        	//截图
        	$result_url = $this->getsmallface($key="0",$imgurl,$data['person']['top'],$data['person']['right'],$data['person']['bottom'],$data['person']['left']);
        	//放进数组
        	$result['candidates'][$key]['thumb_url'] = base_url('upload/face').'/'.$result_url;
        }
        echo json_encode($result);
	}

	public function getface($person_id)
	{
		$url = "http://120.76.26.101:8081/faceApi/persons/".$person_id."?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba";
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return_data = curl_exec($ch);
        curl_close($ch);
        return $return_data;
	}
	//获取远程图片并把它保存到本地
	// $url 是远程图片的完整URL地址，不能为空。
	public function getImage($url){
		if($url==""):return false;endif;
		$face_path = $this->config->item('face_path');
		$ext=strrchr($url,".");
		$filename=date("dMYHis").$ext;
		$filepath=$face_path.'/'.$filename;
		ob_start();
		readfile($url);
		$img = ob_get_contents();
		ob_end_clean();
		$size = strlen($img);
		$fp2=@fopen($filepath, "a");
		fwrite($fp2,$img);
		fclose($fp2);
		return $filename;
	}

	//根据坐标生成头像
   public function getsmallface($key,$imgurl,$top,$right,$bottom,$left)
   {
   		$x = $left;
   		$y = $top;
   		$w = $right - $left;
   		$h = $bottom - $top;

   		$face_path = $this->config->item('face_path');
   		$src=$face_path.'/'.$imgurl;
		//第一步，根据传来的宽，高参数创建一幅图片，然后正好将截取的部分真好填充到这个区域
		header("Content-type: image/jpeg");
		$target = @imagecreatetruecolor($w,$h) or die("Cannot Initialize new GD image stream");

		//第二步，根据路径获取到源图像,用源图像创建一个image对象
		$source = imagecreatefromjpeg($src);
		 
		//第三步，根据传来的参数，选取源图像的一部分填充到第一步创建的图像中
		imagecopy( $target, $source, 0, 0, $x, $y, $w, $h);
		 
		//第四步,保存图像
		//截取并组织新路径
		$pos_path= strripos($src, "/");
		$newPath=substr($src,0,$pos_path-strlen($src))."/face/";
		    //截取并组织新名称
		$pos_name=strripos($imgurl, ".");
		$newName=substr($imgurl,0,$pos_name);
		$pos_name_= strripos($newName, "/");
		    //这里暂时不加后缀“.jpg”，防止有重复的文件，如果有，需要重命名,加了后会不方便
		$newName=$key.'_'.$imgurl;
		    //生成不带后缀的图片
		$file=$newPath.$newName;
	    //如果目录存在
	    if(is_dir($newPath)){
            //创建文件
            imagejpeg($target,$file,100);
	    }else{
	        //创建目录
	        mkdir($newPath);
	        //创建文件
	        imagejpeg($target,$file,100);
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
					echo "<script>alert('请稍后重试或者换张新的图片)</script>";
					echo "<script>window.location= '".site_url("weixin/game/hlike")."';</script>";
					exit();
				}
				else
				{
					$_FILES["file"]["name"][$i] = time().'_'.$i.'.'.$extension;
				}
			}
			else
			{
				echo "<script>alert('非法格式或者图片大于1M')</script>";
				echo "<script>window.location= '".site_url("weixin/game/hlike")."';</script>";
				exit();
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
        	'similarity' => $result['facePairs']?$result['facePairs'][0]['similarity']:0
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
