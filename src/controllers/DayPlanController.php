<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/DayPlan.php';
require_once __DIR__.'/../repository/DayPlanRepository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class DayPlanController extends AppController
{
    private $dayPlanRepository;

    public function __construct(){
        parent::__construct();
        $this->dayPlanRepository = new DayPlanRepository();
        $this->userRepository = new UserRepository();
        $this->user_array = json_decode($_COOKIE['logUser'],true);
    }

    public function home(){
        $plans = $this->dayPlanRepository->getOverviewDayPlans();
        $citiesCounter = $this->dayPlanRepository->howManyCitiesHavePlan();
        $plansCounter = $this->dayPlanRepository->howManyPlansAreMade();
        $details = $this->userRepository->getUser($this->user_array['email']);
        if($this->userRepository->isDetailsAlreadyExists($details)){
            $this->render('home',['details' => $details,'plans' => $plans, 'citiesCounter' => $citiesCounter, 'plansCounter' => $plansCounter]);
        } else {
            $this->userRepository->addUserDetails($details);
            $this->render('home',['details' => $details,'plans' => $plans, 'citiesCounter' => $citiesCounter, 'plansCounter' => $plansCounter]);
        }
    }

}