<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function index()
    {
        $this->load->view('page/page3');
    }

    public function page2()
    {
        $this->load->view('page/page4');
    }

    public function page3()
    {
        $this->load->view('page/page3');
    }

    /*
     * 已弃用
     */
    public function face()
    {
        $id = $this->input->get('id');
        $result = array();
        $comments = file_get_contents(base_url('public/json/face.json'));
        $data = json_decode($comments);
        foreach ($data as $key => $value) {
            if ($value->id == $id) {
                $result = $value->data;
            }
        }
        echo json_encode($result);
    }

    /*
     *
     */
    public function json()
    {
        $id = $this->input->get('id');
        if (empty($id)) {

            exit();
        }
        $result = array();
        $comments = file_get_contents(base_url('public/json/json.json'));
        $data = json_decode($comments);
        foreach ($data as $key => $value) {
            if ($value->id == $id) {
                $result = $value->data;
            }
        }
        echo json_encode($result);
    }
}
