<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::get('logout', 'SecurityController');

Routing::get('home', 'DayPlanController');
Routing::get('discover', 'DefaultController');
Routing::get('favourite', 'DayPlanController');
Routing::get('your_plans', 'DayPlanController');
Routing::get('create_plan', 'DayPlanController');
Routing::post('add_plan', 'DayPlanController');
Routing::get('change_password', 'DefaultController');

Routing::get('account_details', 'UserController');
Routing::get('change_account_details', 'DefaultController');
Routing::get('discover_results', 'DefaultController');
Routing::get('places', 'DayPlanController');
Routing::get('heart', 'DayPlanController');
Routing::get('unheart', 'DayPlanController');
Routing::get('deletePlan','DayPlanController');

Routing::post('addPhoto', 'UserController');
Routing::post('addDetails', 'UserController');
Routing::post('change_pass', 'UserController');
Routing::post('search', 'DayPlanController');
Routing::get('typeMilestones', 'DayPlanController');
Routing::post('day_plan', 'DayPlanController');


Routing::run($path);
