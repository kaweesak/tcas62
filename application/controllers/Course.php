<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->helper('general_helper');

    }

    public function index()
    {
        $data['title'] = 'หลักสูตร';
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        $data['courses'] = $this->course_model->get_all_course();

        $this->data = $data;
        $this->middle = 'frontend/course/index';
        $this->sticky_layout();
    }

    public function edit()
    {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Edit a faqs item';
        $data['faqs_item'] = $this->faqs_model->get_faqs_by_id($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('faqs/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $this->faqs_model->set_faqs($id);
            redirect(base_url() . 'index.php/faqs');
        }
    }

    public function detail($id)
    {
        
        // set js and css scripts to be loaded
        $data['css_scripts'] = array('css/tabs', 'css/personnel');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');

        $data['course'] = $this->course_model->get_course_by_id($id);
        $data['teachers'] = $this->course_model->get_teacher_by_id($id);
        $data['title'] = $data['course']->c_name;
        if (empty($data['course'])) {
            //show_404();
            redirect(site_url('page404'));
        }

        $this->data = $data;
        $this->middle = 'frontend/course/view';
        $this->sticky_layout();
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $faqs_item = $this->faqs_model->get_faqs_by_id($id);

        $this->faqs_model->delete_faqs($id);
        redirect(base_url() . 'index.php/faqs');
    }

}
