<?php


class User
{
    private $surname;
    private $country;
    private $user_photo;
    private $email;
    private $password;
    private $nick;
    private $name;

    public function __construct(string $email, string $password, string $nick){
        $this->email = $email;
        $this->password = $password;
        $this->nick = $nick;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

    public function getUserPhoto()
    {
        return $this->user_photo;
    }

    public function setUserPhoto($user_photo): void
    {
        $this->user_photo = $user_photo;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email): void{
        $this->email = $email;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword(string $password): void{
        $this->password = $password;
    }

    public function setNick(string $nick): void{
        $this->nick = $nick;
    }

    public function getNick(): string{
        return $this->nick;
    }
}
