<?php


class User
{
    private $email;
    private $password;
    private $nick;

    public function __construct(string $email, string $password, string $nick){
        $this->email = $email;
        $this->password = $password;
        $this->nick = $nick;
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
