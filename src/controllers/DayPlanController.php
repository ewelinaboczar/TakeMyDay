<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/DayPlan.php';
require_once __DIR__ . '/../repository/DayPlanRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/milestoneRepository.php';

class DayPlanController extends AppController
{
    private $dayPlanRepository;

    public function __construct()
    {
        parent::__construct();
        $this->dayPlanRepository = new DayPlanRepository();
        $this->userRepository = new UserRepository();
        $this->countryRepository = new CountryRepository();
        $this->milestoneRepository = new milestoneRepository();
        $this->user_array = json_decode($_COOKIE['logUser'], true);
    }

    public function home()
    {
        $planspl = $this->dayPlanRepository->getOverviewDayPlans(true);
        $plansvir = $this->dayPlanRepository->getOverviewDayPlans(false);
        $citiesCounter = $this->dayPlanRepository->howManyCitiesHavePlan();
        $plansCounter = $this->dayPlanRepository->howManyPlansAreMade();

        if ($this->user_array['email'] != null) {
            $details = $this->userRepository->getUser($this->user_array['email']);
            if (!$this->userRepository->isDetailsAlreadyExists($details)) {
                $this->userRepository->addUserDetails($details);
            }
            $this->render('home', ['details' => $details, 'planspl' => $planspl, 'plansvir' => $plansvir, 'citiesCounter' => $citiesCounter, 'plansCounter' => $plansCounter]);
        } else {
            $this->render('login');
        }
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->dayPlanRepository->getPlansByCity($decoded['search']));
        }
    }

    public function addPlan()
    {
        //TODO to nie działa
        if (!$this->isPost()) {
            return $this->render('create_plan');
        }

        $city_name = $_POST['city'];
        $user_id = $this->userRepository->getUserId($this->user_array['email']);

        $this->dayPlanRepository->addNewPlan($city_name, $user_id);
        $location = $_POST['Place location'];
        $type = $_POST['type_milestone'];
        $description = $_POST['plan-description'];

        $this->milestoneRepository->addMilestone($city_name, $location, $type, $description);


    }

    public function day_plan($id)
    {
        $city_country=$this->countryRepository->getCityCountryByPlanId($id);
        $plan = $this->dayPlanRepository->getPlanById($id);
        $milestones = $this->milestoneRepository->getMilestonesByPlanId($id);
        $this->render('day_plan', ['plan' => $plan, 'milestones' => $milestones,'city_country' => $city_country ]);
    }

    public function places()
    {
        $id = 2;
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->milestoneRepository->getPlacesByPlanId($id));
    }

    public function add_plan()
    {
        $userIP = $_SERVER['REMOTE_ADDR'];
        $locationInfo = $this->ipToLocation();
        $milestone_type = $this->countryRepository->getMilestoneType();
        $this->render('add_plan', ['milestone_type' => $milestone_type, 'locationInfo' => $locationInfo]);
    }

    public function typeMilestones()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->milestoneRepository->getMilestoneTypes());
        }
    }

    public function favourite()
    {
        $id = $this->userRepository->getUserId($this->user_array['email']);
        $fav_plans = $this->dayPlanRepository->getFavouritePlans($id);
        $this->render('favourite', ['fav_plans' => $fav_plans]);
    }

    public function your_plans()
    {
        $id = $this->userRepository->getUserId($this->user_array['email']);
        $your_plans = $this->dayPlanRepository->getUserPlans($id);
        $this->render('your_plans', ['your_plans'=>$your_plans]);
    }

    private function ipToLocation()
    {
        $apiURL = 'https://freegeoip.app/json/';

        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $apiResponse = curl_exec($ch);
        if ($apiResponse === FALSE) {
            $msg = curl_error($ch);
            curl_close($ch);
            return false;
        }
        curl_close($ch);

        // Retrieve IP data from API response
        $ipData = json_decode($apiResponse, true);

        // Return geolocation data
        return !empty($ipData) ? $ipData : false;
    }


}