<?php

require_once 'Repository.php';

class CountryRepository extends Repository
{
    public function getCountries()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.country ORDER BY country_name ASC;
        ');
        $stmt->execute();
        return $stmt;
    }

    public function getCity()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.city ORDER BY city_name ASC;
        ');
        $stmt->execute();
        return $stmt;
    }

    public function getCityCountryByPlanId($id)
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.city c 
            left join public.country co on c.country_id = co.country_id
            left join public.day_plan d on d.city_id = c.city_id
            where d.plan_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($all as $a){
            $result[0] = $a["city_name"];
            $result[1] = $a["country_name"];
        }
        return $result;
    }
}