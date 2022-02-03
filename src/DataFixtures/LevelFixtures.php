<?php

namespace App\DataFixtures;

use App\Entity\LevelSkill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LevelFixtures extends Fixture
{
    const LEVELS = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
    public function load(ObjectManager $manager): void
    {
        foreach (self::LEVELS as $key => $data) {
            $level = new LevelSkill();
            $level->setNumber($data);
            $manager->persist($level);
            $this->addReference('level_' . $key, $level);
            
        }

        $manager->flush();
    }
}
