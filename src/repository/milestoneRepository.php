<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Milestone.php';

class MilestoneRepository extends Repository
{
    public function addMilestone(Milestone $mil)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.milestone (milestone_type_id, location, milestone_time, milestone_description)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $mil->getMilestoneType(),
            $mil->getMilestoneLocation(),
            $mil->getMilestoneTime(),
            $mil->getMilestoneDescription()
        ]);
    }

    public function getMilestoneTypeId(string $typee):int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT milestone_type_id FROM public.milestone_type WHERE milestone_type = :typee
        ');
        $stmt->bindParam(':typee', $typee, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn();
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

    public function getMilestoneTypes()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.milestone_type 
        ');
        $stmt->execute();

        return $stmt;
    }

    public function countMilestones($planid): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.v_milestones_counter mc
            where mc.plan_id = :planid
        ');
        $stmt->bindParam(':planid', $planid, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] == null) {
            return 0;
        } else {
            return $result['count'];
        }
    }

    public function getMilestoneId(Milestone $mil):int{
        $loc = $mil->getMilestoneLocation();
        $timee = $mil->getMilestoneTime();
        $descc = $mil->getMilestoneDescription();
        $typee = $mil->getMilestoneType();

        $stmt = $this->database->connect()->prepare('
            SELECT milestone_id FROM public.milestone 
            WHERE milestone_type_id = :typee and 
                  location = :loc and 
                  milestone_time = :timee and
                  milestone_description = :descc
        ');
        $stmt->bindParam(':loc', $loc, PDO::PARAM_STR);
        $stmt->bindParam(':typee', $typee, PDO::PARAM_INT);
        $stmt->bindParam(':timee', $timee,PDO::PARAM_STR);
        $stmt->bindParam(':descc', $descc, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}