<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page404 extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('course_model','tcas_model'));
    }
	
	public function index() 
	{
		$data['title'] = 'มหาวิทยาลัยสวนดุสิต (TCAS)';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        
        $this->data = $data;
        $this->middle = 'err404';
        $this->sticky_layout();		
    }
 
 
}