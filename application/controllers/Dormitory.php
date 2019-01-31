<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dormitory extends MY_Controller {


	public function index()
	{
		$data['title'] = 'หอพักนักศึกษา';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/dormitory/index';
        $this->layout();		
    }
    
    public function view($id)
	{
		$data['title'] = 'หอพักนักศึกษา';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/dormitory/view';
        $this->layout();		
	}
}
