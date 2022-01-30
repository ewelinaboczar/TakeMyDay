<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Milestone.php';

class MilestoneRepository extends Repository
{
    public function addMilestone(string $city, string $location, string $type, string $des)
    {
        //TODO nie wiem jak pobrać id planu
    }

    public function getMilestoneTypeId(string $type): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT milestone_type_id FROM public.milestone_type WHERE milestone_type = :type
        ');
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['milestone_type_id'];
    }

    public function getMilestonesByPlanId(int $planid): array
    {
        $milestones = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone m 
            left join public.rel_milestone_day_plan rmdp on rmdp.milestone_id = m.milestone_id
            left join public.milestone_type mt on mt.milestone_type_id = m.milestone_type_id
            WHERE rmdp.plan_id = :planid ORDER BY m.milestone_time ASC;
        ');
        $stmt->bindParam(':planid', $planid, PDO::PARAM_INT);
        $stmt->execute();
        $milestones_tab = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $i = 0;
        foreach ($milestones_tab as $m) {
            $milestones[$i] = new Milestone($m['location']);
            $milestones[$i]->setMilestoneId($m['milestone_id']);
            $milestones[$i]->setMilestoneTime($m['milestone_time']);
            $milestones[$i]->setMilestoneDescription($m['milestone_description']);
            $milestones[$i]->setMilestoneType($m['milestone_type']);
            $i += 1;
        }
        return $milestones;
    }

    public function getPlacesByPlanId(int $planid): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone m
            LEFT JOIN public.rel_milestone_day_plan rmdp on rmdp.milestone_id = m.milestone_id
            WHERE rmdp.plan_id = :planid
        ');
        $stmt->bindParam(':planid', $planid, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMilestoneTypes(): string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone_type 
        ');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}