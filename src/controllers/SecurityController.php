<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["user_name_or_email"];
        $password = $_POST["password"];
        $user = $userRepository->getUser($email);

        if (!$user){
            return $this->render('login',['messages'=>['User not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login',['messages'=>['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login',['messages'=>['Wrong password!']]);
        }

        return $this->render('home');
    }
}