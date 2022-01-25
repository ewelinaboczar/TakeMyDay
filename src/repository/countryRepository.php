<?php

require_once 'Repository.php';

class CountryRepository extends Repository
{
    public function getCountries(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.country;
        ');
        $stmt->execute();
        return $stmt;
    }
}