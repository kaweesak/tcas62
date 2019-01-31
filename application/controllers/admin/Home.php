<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->library('auth_ldap');
        $this->load->model(array('slide_model','post_model'));
        $this->load->helper('general_helper');
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต (TCAS)';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('js/admin-charts');
        
        //$data['slides'] = $this->slide_model->get_all_slide();
        //$data['posts'] = $this->post_model->get_all_post_limit(10);     

        $this->data = $data;
        $this->middle = 'backend/home';
        $this->backendlayout();		
	}
}
