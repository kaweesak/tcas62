<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
    }

    // get single user
    public function read_user_info($id) {
        //$condition = "id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function read_service_info() {
        $query = $this->db->get('services_group');
        return $query->result();
    }
}