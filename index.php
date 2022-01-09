<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::post('register', 'SecurityController');
Routing::post('login','SecurityController');
Routing::get('home','DefaultController');
Routing::get('discover','DefaultController');
Routing::get('favourite','DefaultController');
Routing::get('your_plans','DefaultController');
Routing::get('create_plan','DefaultController');
Routing::get('change_password','DefaultController');
Routing::get('add_plan','DefaultController');
Routing::get('account_details','DefaultController');
Routing::get('discover_results','DefaultController');
Routing::post('addphoto','UserController');
Routing::get('logout','SecurityController');
Routing::run($path);
