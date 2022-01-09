<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{

    private $userRepository;
    private string $cookieName;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->cookieName = 'user';
    }

    public function login(){
        session_start();
        if(isset($_SESSION['session'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }

        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $user = $userRepository->getUser($email);

        if (!$user){
            return $this->render('login',['messages'=>['User not exist!']]);
        }
        if ($user->getEmail() !== $email && $user->getNick()) {
            return $this->render('login',['messages'=>['User with this email not exist!']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login',['messages'=>['Wrong password!']]);
        }

        $cookieNameValue = $user->getEmail();
        $cookieNick = $user->getNick();

        if(!isset($_COOKIE[$this->cookieName])){
            setcookie($this->cookieName,$cookieNameValue,time() + (3600 * 24 * 30), "/");
            setcookie('nick',$cookieNick,time() + (3600 * 24 * 30), "/");
        }

        $_SESSION['user'] = $user;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function logout(){
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function register(){

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirm_password'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        if (strlen($password) < 8){
            return $this->render('register', ['messages' => ['Your password should contain more than 8 characters']]);
        }

        $user = new User($email,md5($password),$nick);

        $this->userRepository->addUser($user);

        return $this->render('login',['messages' => ['You\'ve been succesfully registrated!']]);
    }
}