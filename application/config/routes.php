<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['table/(:any)'] = 'table/$1';
$route['users/(:any)'] = 'users/$1';
$route['logs'] = 'logs/index';
$route['reports'] = 'reports/index';
$route['users'] = 'users/index';
$route['table'] = 'table/index';
$route['default_controller'] = 'Login';
$route['(:any)'] = 'home/view/$1';
$route['ExcelDataInsert/import_data'] = 'ExcelDataInsert/import_data';
$route['Login/login_validation'] = 'Login/login_validation';
$route['home/Login/logout'] = 'Login/logout';
$route['Users/assignRows'] = 'Users/assignRows';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;