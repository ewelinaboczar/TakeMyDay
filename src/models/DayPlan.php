<?php

class DayPlan{
    private $city;
    private $start_time;
    private $end_time;
    private $created_by;
    private $comments;
    private $likes;
    private $image;
    private $date;

    public function __construct($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function setCity($city): void
    {
        $this->city = $city;
    }
    public function getStartTime()
    {
        return $this->start_time;
    }
    public function setStartTime($start_time): void
    {
        $this->start_time = $start_time;
    }
    public function getEndTime()
    {
        return $this->end_time;
    }
    public function setEndTime($end_time): void
    {
        $this->end_time = $end_time;
    }
    public function getCreatedBy()
    {
        return $this->created_by;
    }
    public function setCreatedBy($created_by): void
    {
        $this->created_by = $created_by;
    }
    public function getComments()
    {
        return $this->comments;
    }
    public function setComments($comments): void
    {
        $this->comments = $comments;
    }
    public function getLikes()
    {
        return $this->likes;
    }
    public function setLikes($likes): void
    {
        $this->likes = $likes;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image): void
    {
        $this->image = $image;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date): void
    {
        $this->date = $date;
    }
}