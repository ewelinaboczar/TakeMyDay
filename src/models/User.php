<?php


class User
{
    private $email;
    private $password;
    private $userName;
    private $country;

    public function __construct(string $email,string $password,string $userName,string $country)
    {
        $this->email = $email;
        $this->password = $password;
        $this->userName = $userName;
        $this->country = $country;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getUserName(): string
    {
        return $this->userName;
    }
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
}