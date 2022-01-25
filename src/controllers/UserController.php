<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $userRepository;
    private $user_array;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->user_array = json_decode($_COOKIE['logUser'],true);
    }

    public function addPhoto()
    {
        session_start();
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $user_array = json_decode($_COOKIE['logUser'],true);
            $user = new User($user_array['email'],$user_array['password'],$user_array['nick']);

            $user->setUserPhoto($_FILES['file']['name']);

            $this->userRepository->addUserPhoto($user);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/account_details");
        }

        $this->render('change_account_details',['messages'=> $this->messages]);
    }

    public function addDetails()
    {
        session_start();
        if (!$this->isPost()) {
            return $this->render('change_account_details');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $country = $_POST['country'];

        $user = new User($this->user_array['email'],$this->user_array['password'],$this->user_array['nick']);

        $user->setName($name);
        $user->setSurname($surname);
        $user->setCountry($country);

        if($this->userRepository->isDetailsAlreadyExists($user)){
            $this->userRepository->updateUserDetails($user);
        } else {
            $this->userRepository->addUserDetails($user);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/account_details");

    }

    public function account_details()
    {
        $details = $this->userRepository->getUser($this->user_array['email']);
        $this->render('account_details',['details' => $details]);
    }

    public function change_pass(){
        session_start();

        $this->messages=null;

        if(!$this->isPost()){
            return $this->render('change_password');
        }

        $pass = $_POST["old_password"];
        $newpass = $_POST["new_password"];
        $confnewpass = $_POST["confirmed_password"];

        $user = $this->userRepository->getUser($_SESSION['user']);

        if (!password_verify($pass, $user->getPassword())) {
            return $this->render('change_password',['messages'=>['You entered the wrong password!']]);
        }
        if ($newpass !== $confnewpass) {
            return $this->render('change_password',['messages'=>['Please provide proper password!']]);
        }
        if (strlen($newpass) < 8){
            return $this->render('change_password', ['messages' => ['Your new password should contain more than 8 characters']]);
        }

        $npassword = password_hash($newpass,PASSWORD_DEFAULT);
        $this->userRepository->updateUserPassword($npassword);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/account_details");
    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large';
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'],self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }
}

