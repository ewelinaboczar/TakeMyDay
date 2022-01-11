<?php

require_once 'AppController.php';

class DefaultController extends AppController {

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
    public function create_plan()
    {
        $this->render('create_plan');
    }
    public function add_plan()
    {
        $this->render('add_plan');
    }
    public function discover_results()
    {
        $this->render('discover_results');
    }
    public function change_account_details()
    {
        $this->render('change_account_details');
    }
    public function change_password()
    {
        $this->render('change_password');
    }
}