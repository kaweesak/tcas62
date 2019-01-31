<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('admin/blog_model');
        $this->load->library('pagination');
        $this->load->helper('general_helper');       
    }
	
	public function index()
	{		
        // set js and css scripts to be loaded
        $data['css_scripts'] = array('css/blog');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min', 'js_module/blog');
             

        $this->data = $data;
        $this->middle = 'backend/blog/blog_list';
        $this->backendlayout();		
    } 

    public function blog_list()
    {
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
        //$department = $this->Department_model->get_departments();
        $blog_list = $this->blog_model->get_blogs();
		
		$data = array();

          foreach($blog_list->result() as $r) {
			  		  
               $data[] = array(
                    $r->n_subject,
                    '-',                    
                    ($r->n_status =='1' ? '<div class="label label-table label-success">publish</div>':'<div class="label label-table label-danger">unpublish</div>'),  
                    $r->n_date_create,                                     
			   		'<span data-toggle="tooltip" data-placement="top" title="Edit"><a href="'.  site_url('admin/blog/blog_edit/' . $r->n_id ) . '" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light" ><i class="fa fa-pencil-square-o"></i></a></span><span data-toggle="tooltip" data-placement="top" title="Delete"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->n_id . '"><i class="fa fa-trash-o"></i></button></span>',
                 
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $blog_list->num_rows(),
                 "recordsFiltered" => $blog_list->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();

    }

    public function blog_add()
	{		
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('css/blog');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min', 'js_module/blog');
             

        $this->data = $data;
        $this->middle = 'backend/blog/blog_add';
        $this->backendlayout();		
    } 

     public function blog_edit($id)
	{		
        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('css/blog');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min', 'js_module/blog');
             

        $this->data = $data;
        $this->middle = 'backend/blog/blog_edit';
        $this->backendlayout();		
    } 

    public function post($id = null)
	{
        $data['post'] = $this->post_model->get_post_by_id($id);
		$data['title'] = $data['post']->n_subject;        
        // set js and css scripts to be loaded
        $data['css_scripts'] = array('css/blog');
        //$data['js_scripts'] = array('vendor/dropzone/dropzone', 'service/upload.files');
        
        $this->data = $data;
        $this->middle = 'backend/blog/view';
        $this->backendlayout();		
    }    

    
}
