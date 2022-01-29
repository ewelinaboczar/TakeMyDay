<?php

class Milestone{
    private $milestone_location;
    private $milestone_time;
    private $milestone_description;
    private $milestone_type;

    public function __construct($milestone_location){
        $this->milestone_location = $milestone_location;
    }

    public function getMilestoneLocation()
    {
        return $this->milestone_location;
    }

    public function setMilestoneLocation($milestone_location): void
    {
        $this->milestone_location = $milestone_location;
    }

    public function getMilestoneTime()
    {
        return $this->milestone_time;
    }

    public function setMilestoneTime($milestone_time): void
    {
        $this->milestone_time = $milestone_time;
    }

    public function getMilestoneDescription()
    {
        return $this->milestone_description;
    }

    public function setMilestoneDescription($milestone_description): void
    {
        $this->milestone_description = $milestone_description;
    }

    public function getMilestoneType()
    {
        return $this->milestone_type;
    }

    public function setMilestoneType($milestone_type): void
    {
        $this->milestone_type = $milestone_type;
    }

}