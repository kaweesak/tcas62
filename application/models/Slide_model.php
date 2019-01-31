<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Slide_model extends CI_Model
{

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //service_request table
    //Function to add record in table
    public function add($data)
    {
        $this->db->insert('tbl_slide', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Function to Delete selected record from table
    public function delete_record($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_slide');

    }

    // Function to update record in table
    public function update_record($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_slide', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_slide()
    {
        $this->db->order_by('s_order', 'ASC');
        $query = $this->db->get_where('tbl_slide', array('s_status' => '1'));
        return $query->result();
    }

    public function update_file_data($data)
    {
        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('tbl_slide', $data);
    }

    public function change_slide_status($data)
    {
        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('tbl_slide', $data);
    }
}
