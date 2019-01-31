<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

     //Function to add record in table
    public function add($data)
    {
        $this->db->insert('_news', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read_post_information($id) {
	
		$condition = "n_id =" . "'" . $id . "' AND n_status='1'";
		$this->db->select('*');
		$this->db->from('_news');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		return $query->result();
	}
   // Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('n_id', $id);
		$this->db->delete('_news');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('n_id', $id);
		if( $this->db->update('_news',$data)) {
			return true;
		} else {
			return false;
		}		
	}

     public function get_posts()
	{
        $this->db->order_by('n_date_create','DESC'); 
       // $query = $this->db->get("_news");
	    return $this->db->get_where('_news', array('n_status' => '1'));
    }

    public function get_all_post_limit($limit)
    {
        $this->db->order_by('n_date_create','DESC'); 
        $query = $this->db->get_where('_news', array('n_status' => '1'),$limit);   
                   
        return $query->result();
    }

    public function get_all_post()
    {
        $query = $this->db->get_where('_news', array('n_status' => '1'));               
        return $query->result();
    }

     // Get Single list
    function get_post_by_id($id) {
        $this->db->select('*');
        $this->db->from('_news');
        $this->db->where('n_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function get_current_page_records($limit, $start) {
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
    
    public function get_total() {
        $this->db->where('n_status', '1');
        $this->db->from('_news');
        return $this->db->count_all_results();
    }

}
