<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slide extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('admin/slide_model'));
        $this->load->helper('general_helper');
    }

    public function index()
    {
        $data['title'] = 'Slide';

        // set js and css scripts to be loaded
        $data['css_scripts'] = array('vendor/dropzone/basic', 'vendor/dropzone/dropzone');
        $data['js_scripts'] = array('vendor/dropzone/dropzone', 'js_module/slide.upload');

        //$data['slides'] = $this->slide_model->get_all_slide();
        //$data['posts'] = $this->post_model->get_all_post_limit(10);

        $this->data = $data;
        $this->middle = 'backend/slide/index';
        $this->backendlayout();
    }

    public function handle_file_upload()
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
                $uploadPath = 'uploads/slide/';
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

    public function change_slide_status()
    {
        if ($this->input->post()) {
            $this->Project_model->change_slide_status($this->input->post());
        }
    }

}
