<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    const SKILLS = [
        [
            'name' => 'HTML',
            'level' => 80,

        ],
        [
            'name' => 'CSS',
            'level' => 60,

        ],
        [
            'name' => 'TWIG',
            'level' => 70,

        ],
        [
            'name' => 'PHP',
            'level' => 70,

        ],
        [
            'name' => 'SYMFONY',
            'level' => 70,

        ],
        [
            'name' => 'FIGMA',
            'level' => 75,

        ],
        [
            'name' => 'MYSQL',
            'level' => 70,

        ],
    ];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 7; $i++) {
            $project = new Skill();
            $project->setName(self::SKILLS[$i]['name']);
            $project->setLevel(self::SKILLS[$i]['level']);
            $manager->persist($project);
        }

        $manager->flush();
    }
}
