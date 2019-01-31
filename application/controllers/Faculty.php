<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('course_model');
        
    }
    
    public function index()
	{
		$data['title'] = 'คณะ/โรงเรียน';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['courses'] = $this->course_model->get_all_tcas();
         
        $this->data = $data;
        $this->middle = 'frontend/faculty/index';
        $this->sticky_layout();		
    }

    public function view($id)
	{
		$data['title'] = 'คณะ/โรงเรียน';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/faculty/view';
        $this->layout();		
	}
}
