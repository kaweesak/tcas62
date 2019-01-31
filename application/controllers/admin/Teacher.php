<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('teacher_model', 'course_model'));
        $this->load->helper('general_helper');
    }

    public function index()
    {
        $data['title'] = 'Teacher';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/summernote/dist/summernote');
        $data['js_scripts'] = array('vendor/datatables/jquery.dataTables.min','vendor/ckeditor/ckeditor', 'js_module/teacher');

        $this->data = $data;
        $this->middle = 'backend/teacher/teacher_list';
        $this->backendlayout();
    }

    public function teacher_detail($id)
    {
        $data['title'] = 'Teacher Detail';

        $data['js_scripts'] = array('js_module/teacher_detail');

        $data['teacher'] = $this->teacher_model->get_by_id($id);
        //$data['teacher_detail'] = $this->teacher_model->get_detail_by_id($id);
        $this->data = $data;
        $this->middle = 'backend/teacher/teacher_detail';
        $this->backendlayout();
    }

    public function _handle_file_upload()
    {
        if (!empty($_FILES['file']['name'])) {
            $filesCount = count($_FILES['file']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['uploadFile']['name'] = str_replace(",", "_", $_FILES['file']['name'][$i]);
                $_FILES['uploadFile']['type'] = $_FILES['file']['type'][$i];
                $_FILES['uploadFile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                $_FILES['uploadFile']['error'] = $_FILES['file']['error'][$i];
                $_FILES['uploadFile']['size'] = $_FILES['file']['size'][$i];

                //Directory where files will be uploaded
                $uploadPath = 'uploads/teacher/';
                //Specifying the file formats that are supported.
                $allowed_types = 'jpg|png|gif';

                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = $allowed_types;
                $config['max_size'] = 0;
                $config['file_ext_tolower'] = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('uploadFile')) {
                    $fileData = $this->upload->data();
                    //$uploadData[$i]['file_name'] = $fileData['file_name'];
                    $filename = $fileData['file_name'];
                    // resize 685 x 320
                    /*  $config['image_library'] = 'gd2';
                    $config['source_image'] = $fileData['full_path'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 1064; //1064
                    $config['height'] = 600; //600
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize(); */

                    $uploadData = array(
                        's_name' => $fileData['file_name'],
                        's_subject' => '',
                        's_url' => '',
                        's_status' => '1',
                        //'upload_by' => $this->ion_auth->user()->row()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                    );

                    $this->slide_model->add($uploadData);
                    //$this->Project_model->update_record($update_status,$r_id);
                    //redirect('home/profile','refresh');
                    $response = array(
                        'status' => 200,
                        'name' => $fileData['file_name'],
                    );

                    echo json_encode($response);
                } else {
                    $response = array('error' => $this->upload->display_errors());
                    echo json_encode($response);
                }

            }

        }
    }

    public function list_files()
    {
        $data = $this->slide_model->get_all_slide();
        if ($data) {
            echo json_encode($data);
        }

    }

    public function update_file_data()
    {
        if ($this->input->post()) {
            $this->slide_model->update_file_data($this->input->post());
        }
    }
    public function remove_file($id)
    {
        $query = $this->db->get_where('tbl_slide', array('id' => $id));
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $file_name = $data->file_name;
            if ($file_name) {
                if (file_exists($file = FCPATH . '/uploads/slide/' . $file_name)) {
                    unlink($file);
                }
            }
        }

        $this->db->delete('tbl_slide', array('id' => $id));
        echo json_encode(array('deleted' => true));
    }

    public function change_teacher_status()
    {
        if ($this->input->post()) {
            $this->teacher_model->change_slide_status($this->input->post());
        }
    }

    //=====================ajax===========================
    public function teacher_list()
    {
        $list = $this->teacher_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $teacher) {
            $no++;
            $row = array();
            $row[] = $teacher->teacher_id;
            $row[] = $teacher->position;
            $row[] = $teacher->prefix;
            $row[] = $teacher->fullname;
            $row[] = $teacher->p_status;
            if ($teacher->p_photo) {
                $row[] = '<a href="' . base_url('uploads/teacher/' . $teacher->course_id . '/' . $teacher->p_photo) . '" target="_blank"><img src="' . base_url('uploads/teacher/' . $teacher->course_id . '/' . $teacher->p_photo) . '" class="img-fluid" /></a>';
            } else {
                $row[] = '(No photo)';
            }

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_teacher(' . "'" . $teacher->teacher_id . "'" . ')"><i class="ti-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="' . site_url('admin/degree/detail/' . $teacher->teacher_id) . '" title="view"><i class="ti-plus"></i> วุฒิการศึกษา</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->teacher_model->count_all(),
            "recordsFiltered" => $this->teacher_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
        exit();

    }

    public function ajax_edit($id)
    {
        $data = $this->teacher_model->get_by_id($id);
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
            'p_detail' => $this->input->post('inputDetail'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload($this->input->post('inputBranch'));
            $data['p_photo'] = $upload;
        }

        $insert = $this->teacher_model->save($data);

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
            'p_detail' => $this->input->post('inputDetail'),
        );

        if ($this->input->post('remove_photo')) // if remove photo checked
        {
            if (file_exists('uploads/teacher/' . $this->input->post('inputBranch') . '/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo')) {
                unlink('uploads/teacher/' . $this->input->post('inputBranch') . '/' . $this->input->post('remove_photo'));
            }

            $data['p_photo'] = '';
        }

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload($this->input->post('inputBranch'));

            //delete file
            $teacher = $this->teacher_model->get_by_id($this->input->post('id'));
            if (file_exists('uploads/teacher/' . $teacher->course_id . '/' . $teacher->p_photo) && $teacher->p_photo) {
                unlink('uploads/teacher/' . $teacher->course_id . '/' . $teacher->p_photo);
            }

            $data['p_photo'] = $upload;
        }

        $this->teacher_model->update(array('teacher_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //delete file
        $teacher = $this->teacher_model->get_by_id($id);
        if (file_exists('uploads/teacher/' . $teacher->course_id . '/' . $teacher->p_photo) && $teacher->p_photo) {
            unlink('uploads/teacher/' . $teacher->course_id . '/' . $teacher->p_photo);
        }

        $this->teacher_model->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _do_upload($folder)
    {
        $config['upload_path'] = 'uploads/teacher/' . $folder . '/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 10000; //set max size allowed in Kilobyte
        $config['max_width'] = 1000; // set max width image allowed
        $config['max_height'] = 1000; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = false;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('inputPosition') == '') {
            $data['inputerror'][] = 'inputPosition';
            $data['error_string'][] = 'Please select Position';
            $data['status'] = false;
        }

        if ($this->input->post('inputBranch') == '') {
            $data['inputerror'][] = 'inputBranch';
            $data['error_string'][] = 'Please select Branch';
            $data['status'] = false;
        }

        if ($this->input->post('inputFullname') == '') {
            $data['inputerror'][] = 'inputFullname';
            $data['error_string'][] = 'Fullname is required';
            $data['status'] = false;
        }
/*
if($this->input->post('inputPosition') == '')
{
$data['inputerror'][] = 'gender';
$data['error_string'][] = 'Please select gender';
$data['status'] = FALSE;
}

if($this->input->post('address') == '')
{
$data['inputerror'][] = 'address';
$data['error_string'][] = 'Addess is required';
$data['status'] = FALSE;
}*/

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
