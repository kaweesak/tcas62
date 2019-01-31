<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends MY_Controller
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
        $data['title'] = 'หลักสูตร';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min','js_module/course');

        //$data['slides'] = $this->slide_model->get_all_slide();
        //$data['posts'] = $this->post_model->get_all_post_limit(10);

        $this->data = $data;
        $this->middle = 'backend/course/course_list';
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

    public function course_list()
    {
        $list = $this->course_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = $r->c_id;
            $row[] = $r->c_name;
            $row[] = ($r->c_status =='1' ? '<div class="label label-table label-success">Open</div>':'<div class="label label-table label-danger">Close</div>');
            //$row[] = $faculty->fac_status;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_faculty(' . "'" . $r->fac_id . "'" . ')"><i class="ti-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="' . site_url('admin/faculty/faculty_detail/' . $r->fac_id ) . '" title="view"><i class="ti-eye"></i> view</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->course_model->count_all(),
            "recordsFiltered" => $this->course_model->count_filtered(),
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
