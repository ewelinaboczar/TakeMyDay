<?php

class DayPlan{
    private $id;
    private $city;
    private $start_time;
    private $end_time;
    private $created_by;
    private $likes;
    private $image;
    private $date;
    private $milestones;
    private $map;

    public function __construct($city, $likes = 0, $id = null)
    {
        $this->city = $city;
        $this->likes = $likes;
        $this->id = $id;
    }

    public function getPlanid()
    {
        return $this->planid;
    }
    public function setPlanid($planid): void
    {
        $this->planid = $planid;
    }

    public function getMap()
    {
        return $this->map;
    }

    public function setMap($map): void
    {
        $this->map = $map;
    }
    public function getMilestones()
    {
        return $this->milestones;
    }
    public function setMilestones($milestones): void
    {
        $this->milestones = $milestones;
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
}