<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faqs extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('faqs_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['faqs'] = $this->faqs_model->get_faqs();
        $data['title'] = 'Faqs archive';

        $this->data = $data;
        $this->middle = 'backend/faqs/index';
        $this->backendlayout();
    }

    public function view($slug = null)
    {
        $data['faqs_item'] = $this->faqs_model->get_faqs($slug);

        if (empty($data['faqs_item'])) {
            show_404();
        }

        $data['title'] = $data['faqs_item']['title'];

        $this->data = $data;
        $this->middle = 'backend/faqs/view';
        $this->backendlayout();

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a FAQ item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === false) {

            $this->data = $data;
            $this->middle = 'backend/faqs/create';
            $this->backendlayout();

        } else {
            $this->faqs_model->set_faqs();

            $this->data = $data;
            $this->middle = 'backend/faqs/success';
            $this->backendlayout();

        }
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

            $this->data = $data;
            $this->middle = 'backend/faqs/edit';
            $this->backendlayout();

        } else {
            $this->faqs_model->set_faqs($id);
            redirect(base_url() . 'beckend/faqs');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $faqs_item = $this->faqs_model->get_faqs_by_id($id);

        $this->faqs_model->delete_faqs($id);
        redirect(base_url() . 'backend/faqs');
    }
}
