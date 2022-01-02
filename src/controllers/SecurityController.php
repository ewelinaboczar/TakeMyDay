<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController{
    public function login(){
        $user = new User("ew@gmail.com","abcd","ew986","Poland");

        $email = $_POST["user_name_or_email"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email) {
            return $this->render('login',['messages'=>['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login',['messages'=>['Wrong password!']]);
        }

        return $this->render('home');
    }
}