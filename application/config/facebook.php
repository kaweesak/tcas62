<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
$config['facebook_app_id']              = 'Your Facebook app ID';
$config['facebook_app_secret']          = 'Your Facebook app secret ';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'facebook-signup';
$config['facebook_logout_redirect_url'] = 'https://example.in/mtp-tw/logout';
$config['facebook_permissions']         = array('public_profile', 'publish_actions', 'email');
$config['facebook_graph_version']       = 'v2.6';
$config['facebook_auth_on_load']        = TRUE;