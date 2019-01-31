<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('course_model','tcas_model'));
    }
	
	public function tcas62()
	{
		$data['title'] = 'แผนรับนักศึกษา ประจำปีการศึกษา 2562';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['tcass'] = $this->course_model->get_all_tcas();
        $this->data = $data;
        $this->middle = 'frontend/page/tcas_62';
        $this->sticky_layout();		
    }
    
    public function map()
	{
		$data['title'] = 'การเดินทาง';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $this->data = $data;
        $this->middle = 'frontend/page/map';
        $this->sticky_layout();		
    }
    
    public function portfolio()
	{
		$data['title'] = 'รอบที่ 1 การรับด้วย Portfolio โดยไม่มีการสอบข้อเขียน';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('css/timeline');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['tcass'] = $this->course_model->get_tcas_by_round(1);
        $data['events'] = $this->tcas_model->get_events_by_round(1);
       
        $this->data = $data;
        $this->middle = 'frontend/page/1';
        $this->sticky_layout();		
    }
    
    public function qouta()
	{
		$data['title'] = 'รอบที่ 2 การรับสมัครแบบโควตา';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['tcass'] = $this->course_model->get_tcas_by_round(2);
        $data['events'] = $this->tcas_model->get_events_by_round(2);
        $this->data = $data;
        $this->middle = 'frontend/page/2';
        $this->sticky_layout();		
    }
    
    public function codirect()
	{
		$data['title'] = 'รอบที่ 3 การรับตรงร่วมกัน';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['tcass'] = $this->course_model->get_tcas_by_round(3);
        $data['events'] = $this->tcas_model->get_events_by_round(3);
        $this->data = $data;
        $this->middle = 'frontend/page/3';
        $this->sticky_layout();		
    }
    
    public function admission()
	{
		$data['title'] = 'รอบที่ 4 การรับแบบ Admission';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['tcass'] = $this->course_model->get_tcas_by_round(4);
        $data['events'] = $this->tcas_model->get_events_by_round(4);
        $this->data = $data;
        $this->middle = 'frontend/page/4';
        $this->sticky_layout();		
    }
    
    public function direct()
	{
		$data['title'] = 'รอบที่ 5 การรับตรงอิสระ';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['tcass'] = $this->course_model->get_tcas_by_round(5);
        $data['events'] = $this->tcas_model->get_events_by_round(5);
        $this->data = $data;
        $this->middle = 'frontend/page/5';
        $this->sticky_layout();		
    }
    
    public function register()
	{
        $data['title'] = 'สมัครเรียน';        
        // set js and css scripts to be loaded
        $data['css_scripts'] = array('vendor/hover-min','vendor/sweetalert2/sweetalert2.min');
        $data['js_scripts'] = array('vendor/sweetalert2/sweetalert2.min', 'js_module/register');
        //$data['tcass'] = $this->course_model->get_tcas_by_round(5);
        //$data['events'] = $this->tcas_model->get_events_by_round(5);
        $this->data = $data;
        $this->middle = 'frontend/page/register';
        $this->sticky_layout();		
    }

    public function tcas_step()
	{
        $data['title'] = 'การเตรียมตัวสมัคร TCAS';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        //$data['tcass'] = $this->course_model->get_tcas_by_round(5);
        //$data['events'] = $this->tcas_model->get_events_by_round(5);
        $this->data = $data;
        $this->middle = 'frontend/page/tcas_step';
        $this->sticky_layout();		
    }

    public function step_register()
	{
        $data['title'] = 'วิธีการสมัครเรียน';        
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        //$data['tcass'] = $this->course_model->get_tcas_by_round(5);
        //$data['events'] = $this->tcas_model->get_events_by_round(5);
        $this->data = $data;
        $this->middle = 'frontend/page/step_register';
        $this->sticky_layout();		
    }
}
