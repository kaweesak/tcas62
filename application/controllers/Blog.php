<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->library('pagination');
        $this->load->helper('general_helper');
    }
	
	public function index()
	{		
        // set js and css scripts to be loaded
        $data['css_scripts'] = array('css/blog');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        
        // init params
        $params = array();
        $limit_per_page = 20;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->post_model->get_total();

        if ($total_records > 0) {
            // get current page records
            $data["posts"] = $this->post_model->get_current_page_records($limit_per_page, $start_index);

            $config['base_url'] = base_url() . 'blog/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            // custom paging configuration
            $config['full_tag_open'] = '<div class="pagination__wrapper add_bottom_30"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></div>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a class="active" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $data['title'] = 'ข่าวทั้งหมด';        
        $data['total_rows'] = $total_records;

        $this->data = $data;
        $this->middle = 'frontend/blog/index';
        $this->sticky_layout();		
    } 
    public function post($id = null)
	{
        $data['post'] = $this->post_model->get_post_by_id($id);
		$data['title'] = $data['post']->n_subject;        
        // set js and css scripts to be loaded
        $data['css_scripts'] = array('css/blog');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        
        $this->data = $data;
        $this->middle = 'frontend/blog/view';
        $this->sticky_layout();		
    }    

    
}
