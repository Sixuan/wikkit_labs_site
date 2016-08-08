<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	private $url = 'http://120.76.26.101:8081/faceApi/detect?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba';
	
	public function index()
	{
		$this->load->view('page/index');
	}

	public function page2()
	{
		$this->load->view('page/page2');
	}
	
	public function face(){
		$id = $_GET['id'];
		$result = array();
		$comments = file_get_contents(base_url('public/json/face.json'));
		$data = json_decode($comments);
		foreach ($data as $key => $value) {
			if($value->id==$id){
				$result=$value->data;
			}
		}
		echo json_encode($result);
	}
}
