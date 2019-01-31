<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('post_model'));
        $this->load->helper('general_helper');
    }

    public function index()
    {
        $data['title'] = 'ข่าว';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('js_module/post');

        //$data['slides'] = $this->slide_model->get_all_slide();
        //$data['posts'] = $this->post_model->get_all_post_limit(10);

        $this->data = $data;
        $this->middle = 'backend/post/post_list';
        $this->backendlayout();
    }

    public function post_list()
    {
      $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
        //$department = $this->Department_model->get_departments();
        $post_list = $this->post_model->get_posts();
		
		$data = array();

          foreach($post_list->result() as $r) {
			  		  
               $data[] = array(
                    $r->n_id,
                    $r->n_subject,
                    $r->n_category,
                    $r->n_date_create,   
                    '<span data-toggle="tooltip" data-placement="top" title="Edit"><a class="btn btn-sm  btn-secondary" href="' . site_url('admin/post/read/' . $r->n_id ) . '" title="view"><i class="fa fa-pencil-square-o"></i></a></span><span data-toggle="tooltip" data-placement="top" title="Delete"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->n_id . '"><i class="fa fa-trash-o"></i></button></span>',
                 
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $post_list->num_rows(),
                 "recordsFiltered" => $post_list->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();

    }

    public function add_post()
    {
        //print_r($this->input->post());
       if($this->input->post('add_type')=='post') {
		// Check validation for user input
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('yt_id', 'Youtube', 'trim|required');
		//$this->form_validation->set_rules('employee_id', 'Employee', 'trim|required|xss_clean');
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		if($this->input->post('inputTitle')==='') {
        	$Return['error'] = 'Title require.';
		} else if($this->input->post('inputYoutube')==='') {
			$Return['error'] = 'Youtube require.';
        } /*else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('error_department_head_field');
        } */
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		 $data = array(
            'title' => $this->input->post('inputTitle'),
            'yt_code' => $this->input->post('inputYoutube'),
            //'prefix' => $this->input->post('inputPrefix'),
            //'fullname' => $this->input->post('inputFullname'),
        );

        $result = $this->post_model->add($data);
		
		if ($result == TRUE) {
			$Return['result'] = 'Add data successful.';
		} else {
			$Return['error'] = 'Cannot add data.';
		}
		$this->output($Return);
		exit;
		}

      
    }

    public function read()
	{
		//$data['title'] = $this->Xin_model->site_title();
        //$id = $this->input->get('n_id');
        $id = $this->uri->segment(4);
        //$data['css_scripts'] = array('vendor/summernote/dist/summernote');
        //$data['js_scripts'] = array('vendor/ckeditor5/ckeditor', 'js_module/post_detail');
       // $data['all_countries'] = $this->xin_model->get_countries();
        $result = $this->post_model->read_post_information($id);
        
		$data = array(
				'n_id' => $result[0]->n_id,
				'title' => $result[0]->n_subject,
                'detail' => $result[0]->n_detail,
                'js_scripts' => array('vendor/ckeditor/ckeditor','vendor/ckfinder/ckfinder', 'js_module/post_detail'),
                //'js_scripts' => array('vendor/tinymce/tinymce.min', 'js_module/post_detail'),
				//'employee_id' => $result[0]->employee_id,
				//'all_locations' => $this->Xin_model->all_locations(),
				//'all_employees' => $this->Xin_model->all_employees()
				);
	
           // $this->load->view('backend/post/post_detail', $data);
        $this->data = $data;
        $this->middle = 'backend/post/post_detail';
        $this->backendlayout();
		
    }
    
    public function update() {
	
		if($this->input->post('edit_type')=='post') {
			
		$id = $this->uri->segment(4);
		
        // Check validation for user input
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('yt_id', 'Youtube', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('department_name', 'Department Name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('location_id', 'Location', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('employee_id', 'Employee', 'trim|required|xss_clean');
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
			
		/* Server side PHP input validation */
		if($this->input->post('inputTitle')==='') {
        	$Return['error'] = 'Title require.';
		} else if($this->input->post('inputYoutube')==='') {
			$Return['error'] = 'Youtube require.';
        }  
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		 'title' => $this->input->post('inputTitle'),
            'yt_code' => $this->input->post('inputYoutube'),
		);
		
		$result = $this->post_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = 'Update record successful.';
		} else {
			$Return['error'] = 'Cannot update record.';
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function delete() {
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'');
		$id = $this->uri->segment(4);
		$result = $this->post_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] ='Deleted record successful.';
		} else {
			$Return['error'] = 'Cannot delete record.';
		}
		$this->output($Return);
    }

    //=======================
    public function ajax_edit($id)
    {
        $data = $this->faculty_model->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'fac_name_th' => $this->input->post('inputFacultyTH'),
            'fac_name_en' => $this->input->post('inputFacultyEN'),
            //'gender' => $this->input->post('gender'),
            //'address' => $this->input->post('address'),
            //'dob' => $this->input->post('dob'),
        );
        $insert = $this->faculty_model->save($data);
        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $data = array(
            'fac_name_th' => $this->input->post('inputFacultyTH'),
            'fac_name_en' => $this->input->post('inputFacultyEN'),
            //'gender' => $this->input->post('gender'),
            //'address' => $this->input->post('address'),
            //'dob' => $this->input->post('dob'),
        );
        $this->faculty_model->update(array('fac_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        $this->faculty_model->delete_by_id($id);
        echo json_encode(array("status" => true));
    }
}
