<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/DayPlan.php';
require_once __DIR__ . '/../repository/DayPlanRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/milestoneRepository.php';

class DayPlanController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private DayPlanRepository $dayPlanRepository;
    private UserRepository $userRepository;
    private CountryRepository $countryRepository;
    private milestoneRepository $milestoneRepository;
    private $user_array;

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

    public function day_plan($id)
    {
        $userid = $this->userRepository->getUserId($this->user_array['email']);
        $milestones_counter = $this->milestoneRepository->countMilestones($id);
        $city_country = $this->countryRepository->getCityCountryByPlanId($id);
        $plan = $this->dayPlanRepository->getPlanById($id);
        $milestones = $this->milestoneRepository->getMilestonesByPlanId($id);
        //$timefrom = $this->milestoneRepository->getMilestoneTimeFrom($id);
        //$timeto = $this->milestoneRepository->getMilestoneTimeTo($id);
        $isFav = $this->dayPlanRepository->isFavourite($id, $userid);
        $this->render('day_plan', ['plan' => $plan,
            'milestones' => $milestones,
            'city_country' => $city_country,
            'milestones_counter' => $milestones_counter,
            'isFav' => $isFav]);
    }
    //'timefrom'=>$timefrom,
    //'timeto'=>$timeto,

    public function places()
    {
        $id = 2;
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->milestoneRepository->getPlacesByPlanId($id));
    }

    public function create_plan()
    {
        $cities = $this->countryRepository->getCity();
        $milestone_type = $this->milestoneRepository->getMilestoneTypes();
        $this->render('create_plan', ['milestone_type' => $milestone_type, 'cities' => $cities]);
    }

    public function add_plan($steps)
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $post_city = $_POST['city'];
            $post_image = $_FILES['file']['name'];
            $post_date = date('Y-m-d');
            $post_place_location[0] = $_POST['place_location'];
            $post_milestone_type[0] = $_POST['milestone_type'];
            $post_milestone_time[0] = $_POST['plan-time'];
            $post_milestone_desc[0] = $_POST['plan-description'];

            $user_id = $this->userRepository->getUserId($this->user_array['email']);
            $city_id = $this->countryRepository->getCityId($post_city);

            $day_plan = new DayPlan($city_id);
            $day_plan->setImage($post_image);
            $day_plan->setDate($post_date);
            $day_plan->setCreatedBy($user_id);

            $mil1 = new Milestone($post_place_location[0]);
            $mil1->setMilestoneType($this->milestoneRepository->getMilestoneTypeId($post_milestone_type[0]));
            $mil1->setMilestoneTime($post_milestone_time[0]);
            $mil1->setMilestoneDescription($post_milestone_desc[0]);

            $this->milestoneRepository->addMilestone($mil1);

            $milestonesId[0] = $this->milestoneRepository->getMilestoneId($mil1);
            $this->dayPlanRepository->addNewPlan($day_plan);
            $plan_id = $this->dayPlanRepository->getPlanId($day_plan);

            $this->dayPlanRepository->addRelPlanMilestone($plan_id, $milestonesId[0]);

            if ($steps > 1) {
                for ($i = 1; $i < $steps; $i++) {
                    $wart = $i - 1;
                    $post_place_location[$i] = $_POST['place_location' . $wart];
                    $post_milestone_type[$i] = $_POST['milestone_type' . $wart];
                    $post_milestone_time[$i] = $_POST['plan-time' . $wart];
                    $post_milestone_desc[$i] = $_POST['plan-description' . $wart];
                    $mil = new Milestone($post_place_location[$i]);
                    $mil->setMilestoneType($this->milestoneRepository->getMilestoneTypeId($post_milestone_type[$i]));
                    $mil->setMilestoneTime($post_milestone_time[$i]);
                    $mil->setMilestoneDescription($post_milestone_desc[$i]);

                    $this->milestoneRepository->addMilestone($mil);

                    $milestonesId[$i] = $this->milestoneRepository->getMilestoneId($mil);

                    $this->dayPlanRepository->addRelPlanMilestone($plan_id, $milestonesId[$i]);
                }
            }
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/create_plan");
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/your_plans");

    }

    public
    function typeMilestones()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->milestoneRepository->getMilestoneTypes());
        }
    }

    public
    function favourite()
    {
        $id = $this->userRepository->getUserId($this->user_array['email']);
        $fav_plans = $this->dayPlanRepository->getFavouritePlans($id);
        $this->render('favourite', ['fav_plans' => $fav_plans]);
    }

    public
    function your_plans()
    {
        $id = $this->userRepository->getUserId($this->user_array['email']);
        $your_plans = $this->dayPlanRepository->getUserPlans($id);
        $counter = $this->getPlansId($your_plans);
        $this->render('your_plans', ['your_plans' => $your_plans, 'counter' => $counter]);
    }

    public
    function heart($id)
    {
        $email = $this->user_array['email'];
        $userid = $this->userRepository->getUserId($email);
        var_dump($userid, $id, 'heart');
        $this->dayPlanRepository->incrementHeart($id, $userid);
        http_response_code(200);
    }

    public
    function unheart($id)
    {
        $userid = $this->userRepository->getUserId($this->user_array['email']);
        var_dump($userid, $id, 'unheart');
        $this->dayPlanRepository->decrementHeart($id, $userid);
        http_response_code(200);
    }

    private
    function getPlansId(array $plans): array
    {
        $result = [];
        $i = 0;
        foreach ($plans as $p) {
            $id = $p->getId();
            $result[$i] = [$id, $this->milestoneRepository->countMilestones($id)];
        }
        return $result;
    }

    private
    function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large';
            return false;
        }
        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }
}