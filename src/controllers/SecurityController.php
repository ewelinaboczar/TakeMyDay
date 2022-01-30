<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->cookieName = 'user';
    }

    public function login()
    {
        session_start();

        $this->message = null;

        if (isset($_SESSION['session'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        try {
            $user = $this->userRepository->getUser($email);
        } catch (InvalidArgumentException $exception) {
            return $this->render('login', ['messages' => $exception->getMessage()]);
        }
        if (!$user) {
            $this->logout();
            return $this->render('login', ['messages' => ['User not exist!']]);
        }
        if ($user->getEmail() !== $email && $user->getNick()) {
            $this->logout();
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
        if (!password_verify($password, $user->getPassword())) {
            $this->logout();
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        if (password_verify($_POST["password"], $user->getPassword())) {
            $_SESSION['user'] = ($_POST['email']);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        unset($_SESSION['user']);
        session_destroy();

        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function register()
    {

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

        if (strlen($password) < 8) {
            return $this->render('register', ['messages' => ['Your password should contain more than 8 characters']]);
        }

        $npassword = password_hash($password, PASSWORD_DEFAULT);

        $user = new User($email, $npassword, $nick);

        $info = $this->validateEmailNick($user, 'register');

        $this->userRepository->addUser($user);

        if ($info == null) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

    }

    private function validateEmailNick(User $user, $tmp)
    {
        if ($this->userRepository->isEmailAlreadyExist($user->getEmail())) {
            $this->render($tmp, ['messages' => ['User with this email already exist!']]);
            die();
        }
        if ($this->userRepository->isNickAlreadyExist($user->getNick())) {
            $this->render($tmp, ['messages' => ['User with this nick already exist!']]);
            die();
        }

    }
}