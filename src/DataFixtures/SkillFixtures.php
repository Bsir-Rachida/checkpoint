<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture 
{
    const SKILLS = [
         'HTML','CSS','TWIG','PHP','SYMFONY','FIGMA','MYSQL',];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $key => $skillName) {
            $skill = new Skill();
            $skill->setName($skillName);
            $skill->setLevelSkill($this->getReference('level_' . ($key)));
            $manager->persist($skill);
            $this->addReference('skill_' . $key, $skill);
        }

        $manager->flush();
    }
  
}
