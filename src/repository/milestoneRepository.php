<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Milestone.php';

class MilestoneRepository extends Repository
{
    public function addMilestone(string $city, string $location, string $type,string $des){
        //TODO nie wiem jak pobrać id planu
    }

    public function getMilestoneTypeId(string $type):int{
        $stmt = $this->database->connect()->prepare('
            SELECT milestone_type_id FROM public.milestone_type WHERE milestone_type = :type
        ');
        $stmt->bindParam(':type',$type,PDO::PARAM_STR);
        $stmt->execute();

        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        return $data['milestone_type_id'];
    }

    public function getMilestoneByPlanId(int $planid){
        //left join public.rel_milestone_day_plan rmdp on rmdp.plan_id = dp.plan_id
            //left join public.milestone m on m.milestone_id = rmdp.milestone_id
            //left join public.milestone_type mt on mt.milestone_type_id = m.milestone_type_id
    }

    public function getPlacesByPlanId(int $planid): array{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone m
            LEFT JOIN public.rel_milestone_day_plan rmdp on rmdp.milestone_id = m.milestone_id
            WHERE rmdp.plan_id = :planid
        ');
        $stmt->bindParam(':planid',$planid,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMilestoneTypes(string $type): bool{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone_type where milestone_type =:type
        ');
        $stmt->bindParam(':type',$type,PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->fetchAll(PDO::FETCH_ASSOC) != null){
            return true;
        }else{
            return false;
        }

    }
}