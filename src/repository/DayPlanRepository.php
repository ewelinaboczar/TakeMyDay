<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/DayPlan.php';

class DayPlanRepository extends Repository
{
    public function getOverviewDayPlans():array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
            select u.nick,
                   d.comments, d.likes, d.image, d.date_added,
                   c.city_name
            FROM public.users u
             left join public.day_plan d on u.id = d.created_by
             left join public.city c on c.city_id = d.city_id 
            where date_added  is not null
        ');
        $stmt->execute();
        $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach ($plans as $plan) {
            $result[$i] = new DayPlan(
                $plan['city_name']
            );
            $result[$i]->setComments($plan['comments']);
            $result[$i]->setLikes($plan['likes']);
            $result[$i]->setCreatedBy($plan['nick']);
            $result[$i]->setImage($plan['image']);
            $result[$i]->setDate($plan['date_added']);
            $i+=1;
        }

        return $result;
    }

    public function howManyCitiesHavePlan():int{
        $stmt = $this->database->connect()->prepare('
            select count(distinct d.city_id) from public.day_plan d
        ');
        $stmt->execute();
        $counter = $stmt->fetch(PDO::FETCH_ASSOC);
        return $counter['count'];
    }

    public function howManyPlansAreMade():int{
        $stmt = $this->database->connect()->prepare('
            select count(*) from public.day_plan
        ');
        $stmt->execute();
        $counter = $stmt->fetch(PDO::FETCH_ASSOC);
        return $counter['count'];
    }
}