<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Faculty_model extends CI_Model
{

    public $table = 'tbl_faculty';
    public $column_order = array('fac_name_th', 'fac_name_en', 'fac_intro', 'fac_detail', 'fac_status', null); //set column field database for datatable orderable
    public $column_search = array('fac_name_th', 'fac_name_en'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    public $order = array('fac_id' => 'asc'); // default order

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();

    }

    //service_request table
    //Function to add record in table
    public function add_record($data)
    {
        $this->db->insert('tbl_faculty', $data);
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
        $this->db->delete('tbl_faculty');

    }

    // Function to update record in table
    public function update_record($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_faculty', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_facultys()
    {       
        return $this->db->get('tbl_faculty');
    }

    

}
