<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Course extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');

    }

    public function user_get()
    {
        if (!$this->get('id')) {
            $this->response(null, 400);
        }

        $user = $this->course_model->get($this->get('id'));

        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(null, 404);
        }
    }

    public function user_post()
    {
        $result = $this->course_model->update($this->post('id'), array(
            'name' => $this->post('name'),
            'email' => $this->post('email'),
        ));

        if ($result === false) {
            $this->response(array('status' => 'failed'));
        } else {
            $this->response(array('status' => 'success'));
        }

    }

    public function users_get()
    {
        $users = $this->course_model->get_all();

        if ($users) {
            $this->response($users, 200);
        } else {
            $this->response(null, 404);
        }
    }

    public function user_put()
    {
        $data = array('returned: ' . $this->put('id'));
        $this->response($data);
    }

    public function user_delete()
    {
        $data = array('returned: ' . $this->delete('id'));
        $this->response($data);
    }

}
