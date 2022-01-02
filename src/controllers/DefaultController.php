<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function register()
    {
        $this->render('register');
    }

    public function index()
    {
        $this->render('login');
    }

    public function home()
    {
        $this->render('home');
    }

    public function discover()
    {
        $this->render('discover');
    }
    public function favourite()
    {
        $this->render('favourite');
    }
    public function your_plans()
    {
        $this->render('your_plans');
    }
    public function discover_results()
    {
        $this->render('discover_results');
    }
}