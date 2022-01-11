<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users u 
            LEFT JOIN public.users_details ud ON u.id = ud.id
            WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null;
        }

        $cookie_name='logUser';
        $cookie_value=json_encode($user);
        setcookie($cookie_name,$cookie_value,time() + (3600 * 24 * 30), "/");

        $new_user = new User(
            $user['email'],
            $user['password'],
            $user['nick'],
        );
        $new_user->setName($user['name']);
        $new_user->setSurname($user['surname']);
        $new_user->setUserPhoto($user['user_photo']);

        return $new_user;
    }

    private function getUserId(string $email): int{

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();

        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

    public function addUser(User $user){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (nick, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getNick(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

    public function addUserDetails(User $user){
        $id = $this->getUserId($user->getEmail());
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users_details (id)
            VALUES (?)
        ');

        $stmt->execute([
            $id
        ]);
    }

    public function addUserPhoto(User $user){
        $id = $this->getUserId($user->getEmail());
        $photo = $user->getUserPhoto();
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users_details 
            SET user_photo = :photo
            WHERE id = :id
        ');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->bindParam(':photo',$photo,PDO::PARAM_STR);

        $stmt->execute();
    }

    public function updateUserPassword(string $npass){
        $id = $this->getUserId($_SESSION['user']);
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users 
            SET password = :npass
            WHERE id = :id
        ');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->bindParam(':npass',$npass,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateUserDetails(User $user){
        $id = $this->getUserId($_SESSION['user']);
        $name = $user->getName();
        $surname = $user->getSurname();

        $stmt = $this->database->connect()->prepare('
            UPDATE public.users_details 
            SET name = :name, surname = :surname
            WHERE id = :id
        ');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':surname',$surname,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function isEmailAlreadyExist(string $email):bool{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users 
            WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);

        $stmt->execute();

        $info = $stmt->fetch(PDO::FETCH_ASSOC);

        if($info == false){
            return false;
        }
        return true;
    }

    public function isNickAlreadyExist(string $nick):bool{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users 
            WHERE nick = :nick
        ');
        $stmt->bindParam(':nick',$nick,PDO::PARAM_STR);

        $stmt->execute();

        $info = $stmt->fetch(PDO::FETCH_ASSOC);

        if($info == false){
            return false;
        }
        return true;
    }

    public function isDetailsAlreadyExists(User $user):bool{
        $id=$this->getUserId($user->getEmail());
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details 
            WHERE id = :id
        ');
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);

        $stmt->execute();

        $info = $stmt->fetch(PDO::FETCH_ASSOC);

        if($info == false){
            return false;
        }
        return true;
    }

}