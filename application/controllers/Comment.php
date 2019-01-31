<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('comments_model');
        $this->load->library('pagination');
        $this->load->helper('general_helper');
    }
	
	public function index()
	{	
        $post = $this->uri->segment(3);
        $datas = $this->comments_model->viewData($post);
        if($datas){
            foreach(datas as $row){
                $datareply = $this->comments_model->viewDataReply($row->comment_id);
                echo '<li class="w3-bar">';
            }
        }
    }
    public function save()
	{	
        $this->comments_model->saveData();
    }
    public function reply()
	{	
        $this->comments_model->saveReply();
    }
    public function update()
	{	
        $this->comments_model->updateData();
    }
    public function trash()
	{	
        $this->comments_model->deleteData();
    }
}