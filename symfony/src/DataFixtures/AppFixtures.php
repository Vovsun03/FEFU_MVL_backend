<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\ProjectGroup;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $group = new ProjectGroup();
        $group->setName('Группа проектов 1');
        $manager->persist($group);

        $project = new Project();
        $project->setName('Проект 1');
        $manager->persist($project);

        $task = new Task();
        $task->setName('Задача 1');
        $task->setDescription('Описание задачи 1');
        $manager->persist($task);

        $manager->flush();
    }
}
