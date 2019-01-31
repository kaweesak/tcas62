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
        $this->db->insert('services_request', $data);
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
        $this->db->delete('services_request');

    }

    // Function to update record in table
    public function update_record($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('_course', $data)) {
            return true;
        } else {
            return false;
        }
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
        $query = $this->db->get_where('_course', array('c_status' => '1'));
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

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('n_date_create', 'DESC');
        $query = $this->db->get_where('_news', array('n_status' => '1'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total()
    {
        $this->db->where('n_status', '1');
        $this->db->from('_news');
        return $this->db->count_all_results();
    }

    /*TCAS */
    public function get_all_tcas()
    {
        $this->db->order_by('fac_id', 'asc');
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get_where('tbl_tcas_course', array('t_status' => '1'));
        return $query->result();
    }

    public function get_tcas_by_round($r)
    {
        if ($r == 1) {
            $where = "substring(tcas_accept,1,1) = '1'";
        } elseif ($r == 2) {
            $where = "substring(tcas_accept,2,1) = '1'";
        } elseif ($r == 3) {
            $where = "substring(tcas_accept,3,1) = '1'";
        } elseif ($r == 4) {
            $where = "substring(tcas_accept,4,1) = '1'";
        } elseif ($r == 5) {
            $where = "substring(tcas_accept,5,1) = '1'";
        }
        $this->db->where($where);
        $this->db->order_by('fac_id', 'asc');
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get_where('tbl_tcas_course', array('t_status' => '1'));
        return $query->result();
    }

    public function get_list_courses()
    {
        $this->db->select('_course');
        $this->db->from($this->table);
        $this->db->order_by('country', 'asc');
        $query = $this->db->get();
        $result = $query->result();

        $countries = array();
        foreach ($result as $row) {
            $countries[] = $row->country;
        }
        return $countries;
    }

    //teacher
    public function get_teacher_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_tcas_teacher');
        $this->db->where('course_id', $id);
        $this->db->where('p_status', '1');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
