<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('login_model'));
    }
    
    public function facebook_signup(){
		$this->load->library('facebook');
		$userData = array();
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUserProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $fbUserProfile['id'];
            // Insert user first name and last name into username
            $userData['username'] = $fbUserProfile['first_name']." ".$fbUserProfile['last_name'];
            $userData['user_email'] = $fbUserProfile['email'];
            // check gender value is exist or not
            if($fbUserProfile['gender']=="male"){
            	$gender = 'M';
            }
            elseif($fbUserProfile['gender']=="female"){
            	$gender = 'F';
            }
            elseif($fbUserProfile['gender']=="other"){
            	$gender = 'O';
            }
            else{
            	$gender = '';
            }
            $userData['gender'] = $gender;
            $userData['picture_url'] = $fbUserProfile['picture']['data']['url'];
            // Insert or update user data
            $userID = $this->Login_model->facebookSignup($userData);
            // Check user data insert or update status
            if(!empty($userID)){
	        	$this->session->set_userdata('user_id',$userID);
	        	redirect('dashboard');
            }
        }else{
            // Get login URL
            $authURL =  $this->facebook->login_url();
            redirect($authURL);
        }
 
	}
}