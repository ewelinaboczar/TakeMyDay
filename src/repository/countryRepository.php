<?php

require_once 'Repository.php';

class CountryRepository extends Repository
{
    public function getCountries(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.country ORDER BY country_name ASC;
        ');
        $stmt->execute();
        return $stmt;
    }

    public function getCity(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.city ORDER BY city_name ASC;
        ');
        $stmt->execute();
        return $stmt;
    }

    public function getMilestoneType(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone_type m ORDER BY m.milestone_type ASC;
        ');
        $stmt->execute();
        return $stmt;
    }
}