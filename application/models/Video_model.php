<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Video_model extends CI_Model
{   
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //Function to add record in table
    public function add($data)
    {
        $this->db->insert('tbl_tcas_video', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_videos()
	{
	  return $this->db->get("tbl_tcas_video");
    }
    
    public function read_video_information($id) {
	
		$condition = "vid =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('tbl_tcas_video');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		return $query->result();
	}
   // Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('vid', $id);
		$this->db->delete('tbl_tcas_video');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('vid', $id);
		if( $this->db->update('tbl_tcas_video',$data)) {
			return true;
		} else {
			return false;
		}		
	}

   // get all departments
	public function all_videos()
	{
	  $query = $this->db->query("SELECT * from tbl_tcas_video");
  	  return $query->result();
	}    

}
