<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::post('register', 'SecurityController');
Routing::post('login','SecurityController');
Routing::get('logout','SecurityController');

Routing::get('home','DayPlanController');
Routing::get('discover','DefaultController');
Routing::get('favourite','DefaultController');
Routing::get('your_plans','DefaultController');
Routing::get('create_plan','DefaultController');
Routing::get('change_password','DefaultController');
Routing::get('add_plan','DefaultController');
Routing::get('account_details','UserController');
Routing::get('change_account_details','DefaultController');
Routing::get('discover_results','DefaultController');

Routing::post('addPhoto','UserController');
Routing::post('addDetails','UserController');
Routing::post('change_pass','UserController');
Routing::run($path);
