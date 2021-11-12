<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function registration()
    {
        $this->render('register');
    }

    public function login()
    {
        $this->render('login');
    }
}