<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Name:  Ion Auth
 *
 * Version: 2.5.2
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 */

$config['tables']['tb_users'] = 'tb_users';
$config['tables']['tb_groups'] = 'tb_groups';
$config['tables']['tb_users_groups'] = 'tb_users_groups';


$config['join']['tb_users'] = 'user_id';
$config['join']['tb_groups'] = 'group_id';

$config['hash_method'] = 'bcrypt'; 
$config['default_rounds'] = 8;  
$config['random_rounds'] = FALSE;
$config['min_rounds'] = 5;
$config['max_rounds'] = 9;
$config['salt_prefix'] = version_compare(PHP_VERSION, '5.3.7', '<') ? '$2a$' : '$2y$';


$config['site_title'] = "Meta365";       
$config['admin_email'] = "admin@nexterweb.id"; 
$config['admin_group'] = 'admin';             
$config['identity'] = 'email';             
$config['min_password_length'] = 8;                  
$config['max_password_length'] = 20;                  

$config['remember_cookie_name'] = 'remember_code';
$config['identity_cookie_name'] = 'identity';

