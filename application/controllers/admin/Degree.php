<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Degree extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('degree_model', 'teacher_model'));
        $this->load->helper('general_helper');
    }

     public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
    }

    public function index($id)
    {
        $data['title'] = 'Teacher Detail';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('js_module/teacher_detail');

        $data['teacher'] = $this->teacher_model->get_by_id($id);

        $this->data = $data;
        $this->middle = 'backend/teacher/teacher_detail';
        $this->backendlayout();
    }

    public function detail($id)
    {
        $data['title'] = 'Teacher Detail';

        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min','js_module/teacher_detail');

        $data['teacher'] = $this->teacher_model->get_by_id($id);
        //$data['teacher_detail'] = $this->teacher_model->get_detail_by_id($id);
        $this->data = $data;
        $this->middle = 'backend/teacher/teacher_detail';
        $this->backendlayout();
    }

    //=====================ajax===========================
    public function degree_list($id)
    {
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
        //$tid = $this->input->post("tid");
        $degree_list = $this->degree_model->get_degrees($id);
		
		$data = array();

          foreach($degree_list->result() as $r) {
			  		  
               $data[] = array(
                    $r->degree_id,
                    $r->degree_name,
                    $r->complete_date,
                    $r->degree_shot,
                    $r->branch_success,
                    $r->university,

            //add html for action
            '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_degree(' . "'" . $r->degree_id . "'" . ')"><i class="ti-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="view" onclick="delete_degree(' . "'" . $r->degree_id . "'" . ')"><i class="ti-trash"></i> Delete</a>',

               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $degree_list->num_rows(),
                 "recordsFiltered" => $degree_list->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();

    }

     public function degree_list2()
    {
        $list = $this->degree_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $degree) {
            $no++;
            $row = array();
            $row[] = $degree->degree_id;
            $row[] = $degree->degree_name;
            $row[] = $degree->complete_date;
            $row[] = $degree->degree_shot;
            $row[] = $degree->branch_success;
            $row[] = $degree->university;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_degree(' . "'" . $degree->degree_id . "'" . ')"><i class="ti-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="view" onclick="delete_degree(' . "'" . $degree->degree_id . "'" . ')"><i class="ti-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->degree_model->count_all(),
            "recordsFiltered" => $this->degree_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
        exit();

    }

    public function ajax_edit($id)
    {
        $data = $this->degree_model->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'teacher_id' => $this->input->post('teacher_id'),
            'degree_name' => $this->input->post('inputDegree'),
            'complete_date' => $this->input->post('inputYear'),
            'degree_shot' => $this->input->post('inputDegreeShot'),
            'branch_success' => $this->input->post('inputBranch'),
            'university' => $this->input->post('inputUniversity'),
            //'s_order' => $this->input->post('inputOrder'),
        );

        $insert = $this->degree_model->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'degree_name' => $this->input->post('inputDegree'),
            'complete_date' => $this->input->post('inputYear'),
            'degree_shot' => $this->input->post('inputDegreeShot'),
            'branch_success' => $this->input->post('inputBranch'),
            'university' => $this->input->post('inputUniversity'),
            //'s_order' => $this->input->post('inputOrder'),
        );

        $this->degree_model->update(array('degree_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {

        $this->degree_model->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('inputDegree') == '') {
            $data['inputerror'][] = 'inputDegree';
            $data['error_string'][] = 'Please select Degree';
            $data['status'] = false;
        }

        if ($this->input->post('inputYear') == '') {
            $data['inputerror'][] = 'inputYear';
            $data['error_string'][] = 'Year is required';
            $data['status'] = false;
        }

        if ($this->input->post('inputBranch') == '') {
            $data['inputerror'][] = 'inputBranch';
            $data['error_string'][] = 'Branch is required';
            $data['status'] = false;
        }

        if ($this->input->post('inputUniversity') == '') {
            $data['inputerror'][] = 'inputUniversity';
            $data['error_string'][] = 'University is required';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
