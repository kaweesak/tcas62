<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Course_model extends CI_Model
{
  
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //service_request table
    //Function to add record in table
    public function add_record($data)
    {
        $this->db->insert('tbl_tcas_course', $data);
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
        $this->db->delete('tbl_tcas_course');

    }

    // Function to update record in table
    public function update_record($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_tcas_course', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_courses()
	{
	  return $this->db->get("_course");
    }

    public function get_events()
	{
	  return $this->db->get("tbl_tcas_events");
    }

    public function get_all_course_limit($limit)
    {
        //$this->db->order_by('n_date_create','DESC');
        $query = $this->db->get_where('_course', array('c_status' => '1'), $limit);
        return $query->result();
    }

    public function get_all_course()
    {
        $this->db->order_by('fac_id', 'asc');
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get('_course');
        return $query->result();
    }

    // Get Single list
    public function get_course_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('_course');
        $this->db->where('c_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    

}
