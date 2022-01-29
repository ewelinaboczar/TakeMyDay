<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/CountryRepository.php';

class DefaultController extends AppController {

    private $countryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->countryRepository = new CountryRepository();
    }

    public function index()
    {
        $this->render('login');
    }

    public function discover()
    {
        $city = $this->countryRepository->getCity();
        $this->render('discover',['city'=>$city]);
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
    public function discover_results()
    {
        $this->render('discover_results');
    }
    public function change_account_details()
    {
        $countries = $this->countryRepository->getCountries();
        $this->render('change_account_details',['countries'=>$countries]);
    }
    public function change_password()
    {
        $this->render('change_password');
    }

}