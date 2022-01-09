<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addphoto()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $user = new User($_FILES['file']['name']);

            return $this->render('home',['messages'=> $this->messages, 'user'=>$user]);
        }

        $this->render('home',['messages'=> $this->messages]);
    }

    public function completionOfData(){

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

