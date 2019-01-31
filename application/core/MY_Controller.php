<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
//set the class variable.
    var $template = array();
    var $stemplate = array();
    var $backendtemplate = array();
    var $data = array();

    public function __construct() {
        parent::__construct();
        
    }

    //Load layout
    public function layout() {
        // making temlate and send data to view.
        $this->template['header'] = $this->load->view('frontend/layout/header', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['footer'] = $this->load->view('frontend/layout/footer', $this->data, true);
        $this->load->view('frontend/layout/template', $this->template);
    }

    public function sticky_layout() {
        // making temlate and send data to view.
        $this->stemplate['header'] = $this->load->view('frontend/layout/header_sticky', $this->data, true);
        $this->stemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->stemplate['footer'] = $this->load->view('frontend/layout/footer_sticky', $this->data, true);
        $this->load->view('frontend/layout/sticky_template', $this->stemplate);
    }

    public function backendlayout() {
        // making temlate and send data to view.
        $this->backendtemplate['header'] = $this->load->view('backend/layout/header', $this->data, true);
        $this->backendtemplate['left']   = $this->load->view('backend/layout/left', $this->data, true);
        $this->backendtemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->backendtemplate['footer'] = $this->load->view('backend/layout/footer', $this->data, true);
        $this->load->view('backend/layout/template', $this->backendtemplate);       
      }

}
