<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function facebookSignup($data = array()){
		$this->db->select('*');
        $this->db->from('user_logins');
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $query = $this->db->get();
        $check = $query->num_rows();
 
        if($check > 0){
            $result = $query->row_array();
            //$data['last_update_date'] = date("Y-m-d");
            $update = $this->db->update('user_logins',['last_update_date'=>date("Y-m-d H:i:s")],array('register_id'=>$result['register_id']));
            $userID = $result['register_id'];
        }else{
        	$data['pen'] = $pen;
            $data['register_date'] = date("Y-m-d H:i:s");
            $data['last_update_date']= date("Y-m-d H:i:s");
            $data['register_status'] = "A";
            $insert = $this->db->insert('user_logins',$data);
            $userID = $this->db->insert_id();
        }
        return $userID?$userID:false;
	}
}