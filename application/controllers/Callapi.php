<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callapi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    //Native curl
    public function native_curl($new_name, $new_email)
    {
        $username = 'admin';
        $password = '1234';

        // Alternative JSON version
        // $url = 'http://twitter.com/statuses/update.json';
        // Set up and execute the curl process
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/restserver/index.php/example_api/user/id/1/format/json');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
            'name' => $new_name,
            'email' => $new_email,
        ));

        // Optional, delete this line if your API is open
        curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        $result = json_decode($buffer);

        if (isset($result->status) && $result->status == 'success') {
            echo 'User has been updated.';
        } else {
            echo 'Something has gone wrong';
        }
    }
//CI curl
    public function ci_curl($new_name, $new_email)
    {
        $username = 'admin';
        $password = '1234';

        $this->load->library('curl');

        $this->curl->create('http://localhost/restserver/index.php/example_api/user/id/1/format/json');

        // Optional, delete this line if your API is open
        $this->curl->http_login($username, $password);

        $this->curl->post(array(
            'name' => $new_name,
            'email' => $new_email,
        ));

        $result = json_decode($this->curl->execute());

        if (isset($result->status) && $result->status == 'success') {
            echo 'User has been updated.';
        } else {
            echo 'Something has gone wrong';
        }
    }

    //REST client library
    public function rest_client_example($id)
    {
        $this->load->library('rest', array(
            'server' => 'http://localhost/restserver/index.php/example_api/',
            'http_user' => 'admin',
            'http_pass' => '1234',
            'http_auth' => 'basic', // or 'digest'
        ));

        $user = $this->rest->get('user', array('id' => $id), 'json');

        echo $user->name;
    }

}
