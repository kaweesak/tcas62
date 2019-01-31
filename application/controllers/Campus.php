<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends MY_Controller {


	public function index()
	{
		$data['title'] = 'ศูนย์การศึกษา';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/index';
        $this->layout();		
    }
    
    public function view($id)
	{
		$data['title'] = 'ศูนย์การศึกษา';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/view';
        $this->layout();		
    }
    public function science()
    {
		$data['title'] = 'ศูนย์วิทยาศาสตร์';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/science';
        $this->layout();		
    }

    public function suphanburi()
	{
		$data['title'] = 'วิทยาเขตสุพรรณบุรี';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/suphanburi';
        $this->layout();		
    }

    public function lampang()
	{
		$data['title'] = 'ศูนย์การศึกษาลำปาง';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/lampang';
        $this->layout();		
    }

    public function nakhonnayok()
	{
		$data['title'] = 'ศูนย์การศึกษานครนายก';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/nakhonnayok';
        $this->layout();		
    }

    public function huahin()
	{
		$data['title'] = 'ศูนย์การศึกษาหัวหิน';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/huahin';
        $this->layout();		
    }

    public function trang()
	{
		$data['title'] = 'ศูนย์การศึกษาตรัง';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/campus/trang';
        $this->layout();		
    }
}
