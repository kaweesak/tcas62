<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'home';
$route['404_override'] = 'Page404';
$route['translate_uri_dashes'] = false;

$route['facebook-signup'] = 'login/facebook_signup';
//backend
$route['admin'] = 'admin/home';

$route['faqs'] = 'faqs';
$route['faqs/create'] = 'faqs/create';
$route['faqs/edit/(:any)'] = 'faqs/edit/$1';
$route['faqs/view/(:any)'] = 'faqs/view/$1';
$route['faqs/(:any)'] = 'faqs/view/$1';

/*
| -------------------------------------------------------------------------
| REST API Routes
| -------------------------------------------------------------------------
 */
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
