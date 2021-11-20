<?php

class dayPlans{
    private int $number;
    private string $imageUrl;
    private string $location;
    private string $hours;
    private int $comments;
    private string $faceUrl;
    private string $nick;

    public function __construct(int $number, string $imageUrl, string $location, string $hours, int $comments, string $faceUrl, string $nick)
    {
        $this->number = $number;
        $this->imageUrl = $imageUrl;
        $this->location = $location;
        $this->hours = $hours;
        $this->comments = $comments;
        $this->faceUrl = $faceUrl;
        $this->nick = $nick;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getHours(): string
    {
        return $this->hours;
    }

    public function setHours(string $hours): void
    {
        $this->hours = $hours;
    }

    public function getComments(): int
    {
        return $this->comments;
    }

    public function setComments(int $comments): void
    {
        $this->comments = $comments;
    }

    public function getFaceUrl(): string
    {
        return $this->faceUrl;
    }

    public function setFaceUrl(string $faceUrl): void
    {
        $this->faceUrl = $faceUrl;
    }

    public function getNick(): string
    {
        return $this->nick;
    }

    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }




}