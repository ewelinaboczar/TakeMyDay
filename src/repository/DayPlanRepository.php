<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/DayPlan.php';

class DayPlanRepository extends Repository
{
    public function getOverviewDayPlans(bool $what): array
    {
        $result = [];
        $country_glob = "Poland";
        if ($what == true) {
            $stmt = $this->database->connect()->prepare('
            select u.nick,
                   d.comments, d.likes, d.image, d.date_added,
                   c.city_name, d.plan_id
            FROM public.users u
                left join public.day_plan d on u.id = d.created_by
                left join public.city c on c.city_id = d.city_id
                left join public.country co on c.country_id = co.country_id
            where date_added is not null and co.country_name like :country_glob order by d.likes desc 
        ');
            $stmt->bindParam(':country_glob', $country_glob, PDO::PARAM_STR);
            $stmt->execute();
            $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $i = 0;
            foreach ($plans as $plan) {
                $result[$i] = new DayPlan(
                    $plan['city_name']
                );
                $result[$i]->setId($plan['plan_id']);
                $result[$i]->setComments($plan['comments']);
                $result[$i]->setLikes($plan['likes']);
                $result[$i]->setCreatedBy($plan['nick']);
                $result[$i]->setImage($plan['image']);
                $result[$i]->setDate($plan['date_added']);
                $i += 1;
            }

            return $result;
        } else {
            $stmt = $this->database->connect()->prepare('
            select u.nick,
                   d.comments, d.likes, d.image, d.date_added,
                   c.city_name, d.plan_id
            FROM public.users u
                left join public.day_plan d on u.id = d.created_by
                left join public.city c on c.city_id = d.city_id
                left join public.country co on c.country_id = co.country_id
            where date_added is not null order by d.likes desc 
        ');
            $stmt->execute();
            $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $i = 0;
            foreach ($plans as $plan) {
                $result[$i] = new DayPlan(
                    $plan['city_name']
                );
                $result[$i]->setId($plan['plan_id']);
                $result[$i]->setComments($plan['comments']);
                $result[$i]->setLikes($plan['likes']);
                $result[$i]->setCreatedBy($plan['nick']);
                $result[$i]->setImage($plan['image']);
                $result[$i]->setDate($plan['date_added']);
                $i += 1;
            }
            return $result;
        }

    }

    public function howManyCitiesHavePlan(): int
    {
        $stmt = $this->database->connect()->prepare('
            select count(distinct d.city_id) from public.day_plan d
        ');
        $stmt->execute();
        $counter = $stmt->fetch(PDO::FETCH_ASSOC);
        return $counter['count'];
    }

    public function howManyPlansAreMade(): int
    {
        $stmt = $this->database->connect()->prepare('
            select count(*) from public.day_plan
        ');
        $stmt->execute();
        $counter = $stmt->fetch(PDO::FETCH_ASSOC);
        return $counter['count'];
    }

    public function getPlansByCity(string $searchString)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.day_plan d
                left join public.users u on u.id = d.created_by
                left join public.city c on c.city_id = d.city_id
                left join public.v_milestones_counter v on v.plan_id = d.plan_id
            where date_added is not null and c.city_name like :searchString
        ');
        $stmt->bindParam(':searchString', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlanById(int $id): DayPlan
    {
        $stmt = $this->database->connect()->prepare('
            select * from public.day_plan dp 
            left join public.users u on u.id = dp.created_by
            left join public.city c on c.city_id = dp.city_id
            where dp.plan_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $plan = $stmt->fetch(PDO::FETCH_ASSOC);

        $dayplan = new DayPlan($plan['city_name']);
        $dayplan->setId($plan['plan_id']);
        $dayplan->setComments($plan['comments']);
        $dayplan->setCreatedBy($plan['nick']);
        $dayplan->setDate($plan['date_added']);
        $dayplan->setImage($plan['image']);
        $dayplan->setLikes($plan['likes']);
        $map = 'available';
        if ($plan['map'] == false) {
            $map = 'not available';
        }
        $dayplan->setMap($map);
        return $dayplan;
    }

    public function getFavouritePlans(int $userid): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            select u.nick,
                   d.comments, d.likes, d.image, d.date_added,
                   c.city_name, d.plan_id, d.map
            FROM public.users u
                left join public.day_plan d on u.id = d.created_by
                left join public.city c on c.city_id = d.city_id
                left join public.country co on c.country_id = co.country_id
                left join public.users_day_plan udp on udp.id_day_plan = d.plan_id
            where date_added is not null and udp.id_user = :userid order by d.date_added desc 
        ');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();
        $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $i = 0;
        foreach ($plans as $plan) {
            $result[$i] = new DayPlan(
                $plan['city_name']
            );
            $result[$i]->setId($plan['plan_id']);
            $result[$i]->setComments($plan['comments']);
            $result[$i]->setLikes($plan['likes']);
            $result[$i]->setCreatedBy($plan['nick']);
            $result[$i]->setImage($plan['image']);
            $result[$i]->setMap($plan['map']);
            $result[$i]->setDate($plan['date_added']);
            $i += 1;
        }
        return $result;
    }

    public function getUserPlans(int $userid): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            select u.nick,
                   d.comments, d.likes, d.image, d.date_added,
                   c.city_name, d.plan_id, d.map
            FROM public.users u
                left join public.day_plan d on u.id = d.created_by
                left join public.city c on c.city_id = d.city_id
                left join public.country co on c.country_id = co.country_id
            where date_added is not null and d.created_by = :userid order by d.date_added desc 
        ');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();
        $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $i = 0;
        foreach ($plans as $plan) {
            $result[$i] = new DayPlan(
                $plan['city_name']
            );
            $result[$i]->setId($plan['plan_id']);
            $result[$i]->setComments($plan['comments']);
            $result[$i]->setLikes($plan['likes']);
            $result[$i]->setCreatedBy($plan['nick']);
            $result[$i]->setImage($plan['image']);
            $result[$i]->setDate($plan['date_added']);
            $result[$i]->setMap($plan['map']);
            $i += 1;
        }
        return $result;
    }

    private function getCityId(string $city): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT city_id FROM public.city 
            WHERE city_name = :city
        ');
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['city_id'];
    }

}