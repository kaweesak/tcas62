<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        /*$this->load->library('auth_ldap');
        if(!$this->auth_ldap->is_authenticated()){
             redirect('auth2');
        }*/
        $this->load->model(array('admin/faculty_model', 'admin/course_model'));
        $this->load->helper('general_helper');
        
    }

    public function index()
    {
        $data['title'] = 'คณะ/โรงเรียน';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min','vendor/ckeditor/ckeditor','js_module/faculty');
       
        $this->data = $data;
        $this->middle = 'backend/faculty/faculty_list';
        $this->backendlayout();
    }

     public function faculty_detail($id)
    {
        $data['title'] = 'Faculty Detail';

        $data['js_scripts'] = array('js_module/faculty_detail');

        $data['faculty'] = $this->faculty_model->get_by_id($id);
        //$data['teacher_detail'] = $this->teacher_model->get_detail_by_id($id);
        $this->data = $data;
        $this->middle = 'backend/faculty/faculty_detail';
        $this->backendlayout();
    }

    public function faculty_list(){
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
        //$department = $this->Department_model->get_departments();
        $faculty_list = $this->faculty_model->get_facultys();
		
		$data = array();

          foreach($faculty_list->result() as $r) {
			  		  
               $data[] = array(
                    $r->fac_id,
                    $r->fac_name_th,
                    $r->fac_name_en,                   
			   		'<span data-toggle="tooltip" data-placement="top" title="Edit"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"  data-toggle="modal" data-target="#edit-modal-data"  data-video_id="'. $r->fac_id . '"><i class="fa fa-pencil-square-o"></i></button></span><span data-toggle="tooltip" data-placement="top" title="Delete"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->fac_id . '"><i class="fa fa-trash-o"></i></button></span>',
                 
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $faculty_list->num_rows(),
                 "recordsFiltered" => $faculty_list->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
    }

    public function faculty_list2()
    {
        $list = $this->faculty_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $faculty) {
            $no++;
            $row = array();
            $row[] = $faculty->fac_id;
            $row[] = $faculty->fac_name_th;
            $row[] = $faculty->fac_name_en;
            //$row[] = $faculty->fac_status;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_faculty(' . "'" . $faculty->fac_id . "'" . ')"><i class="ti-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="' . site_url('admin/faculty/faculty_detail/' . $faculty->fac_id ) . '" title="view"><i class="ti-eye"></i> view</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->faculty_model->count_all(),
            "recordsFiltered" => $this->faculty_model->count_filtered(),
            "data" => $data,
        );
//output to json format
        echo json_encode($output);

    }

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

    //============2==============
    public function index2(){
        $data['title'] = 'คณะ/โรงเรียน';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('vendor/ckeditor/ckeditor','js_module/faculty2');

        //$data['slides'] = $this->slide_model->get_all_slide();
        //$data['posts'] = $this->post_model->get_all_post_limit(10);

        $this->data = $data;
        $this->middle = 'backend/faculty/faculty_list_2';
        $this->backendlayout();
    }
    public function view(){
        $data['crud'] = $this->crud_model->getVew();
        $this->load->view('view_data',$data);
    }
     public function add(){
        $data = array(
            'id'=> $this->input->post('id'),
            'name'=> $this->input->post('nm'),
            'email'=> $this->input->post('em'),
            'phone'=> $this->input->post('hp'),
            'address'=> $this->input->post('ad'),
        );
        $this->crud_model->postNew($data);
    }
     public function update(){
         $data = array(           
            'name'=> $this->input->post('nm'),
            'email'=> $this->input->post('em'),
            'phone'=> $this->input->post('hp'),
            'address'=> $this->input->post('ad'),
        );
        $this->crud_model->postUpdate(array('id'=> $this->input->post('id')),$data);
    }
     public function remove(){
        $id = $this->input->post('id');
        $this->crud_model->getDelete($id);
    }
    
}
