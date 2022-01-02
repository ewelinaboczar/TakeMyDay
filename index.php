<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

//Routing::get('login','DefaultController');
Routing::get('','DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('home','DefaultController');
Routing::get('discover','DefaultController');
Routing::get('favourite','DefaultController');
Routing::get('your_plans','DefaultController');
Routing::get('discover_results','DefaultController');
Routing::post('login','SecurityController');
Routing::run($path);
