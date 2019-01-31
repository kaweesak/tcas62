<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('admin/video_model'));
        $this->load->helper('general_helper');
    }

    public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
    }
    
    public function index()
    {
        $data['title'] = 'Video';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min','js_module/video');

        $this->data = $data;
        $this->middle = 'backend/video/video_list';
        $this->backendlayout();
    }

    public function change_video_status()
    {
        if ($this->input->post()) {
            $this->video_model->change_video_status($this->input->post());
        }
    }

    //=====================ajax===========================
    public function video_list()
    {
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
        //$department = $this->Department_model->get_departments();
        $video_list = $this->video_model->get_videos();
		
		$data = array();

          foreach($video_list->result() as $r) {
			  		  
               $data[] = array(
                    $r->vid,
                    $r->yt_code,
                    $r->title,                   
			   		'<span data-toggle="tooltip" data-placement="top" title="Edit"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target="#edit-modal-data"  data-video_id="'. $r->vid . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="Delete"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->vid . '"><i class="fa fa-trash-o"></i></button></span>',
                 
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $video_list->num_rows(),
                 "recordsFiltered" => $video_list->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();

    }

     public function add_video()
    {
        //print_r($this->input->post());
       if($this->input->post('add_type')=='video') {
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

        $result = $this->video_model->add($data);
		
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
		$id = $this->input->get('video_id');
       // $data['all_countries'] = $this->xin_model->get_countries();
		$result = $this->video_model->read_video_information($id);
		$data = array(
				'vid' => $result[0]->vid,
				'title' => $result[0]->title,
				'yt_code' => $result[0]->yt_code,
				//'employee_id' => $result[0]->employee_id,
				//'all_locations' => $this->Xin_model->all_locations(),
				//'all_employees' => $this->Xin_model->all_employees()
				);
	
			$this->load->view('backend/video/dialog_video', $data);
		
    }
    
    public function update() {
	
		if($this->input->post('edit_type')=='video') {
			
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
		
		$result = $this->video_model->update_record($data,$id);		
		
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
		$result = $this->video_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] ='Deleted record successful.';
		} else {
			$Return['error'] = 'Cannot delete record.';
		}
		$this->output($Return);
    }
    //=================================================================
    public function ajax_edit($id)
    {
        $data = $this->video_model->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'position' => $this->input->post('inputPosition'),
            'course_id' => $this->input->post('inputBranch'),
            'prefix' => $this->input->post('inputPrefix'),
            'fullname' => $this->input->post('inputFullname'),
        );

        $insert = $this->video_model->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'position' => $this->input->post('inputPosition'),
            'course_id' => $this->input->post('inputBranch'),
            'prefix' => $this->input->post('inputPrefix'),
            'fullname' => $this->input->post('inputFullname'),
        );

        $this->video_model->update(array('teacher_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {

        $this->video_model->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('inputTitle') == '') {
            $data['inputerror'][] = 'inputTitle';
            $data['error_string'][] = 'Title is required';
            $data['status'] = false;
        }

        if ($this->input->post('inputYoutubeID') == '') {
            $data['inputerror'][] = 'inputYoutubeID';
            $data['error_string'][] = 'Youtube ID is required';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
