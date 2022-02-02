<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    const PROJECTS = [
        [
            'name' => 'Dracula',
            'image' => 'dracula.jpg',   
            'description' => 'Quelques informations autour du sujet, liens, citations, annonces, etc. Habituellement c\'est contextuel au contenu principal (par exemple sur une page d\'informations, la barre latérale peut contenir la biographie de l\'auteur, ou des liens vers des articles connexes) mais il y a aussi des cas où vous trouverez des éléments récurrents comme un système de navigation secondaire.'
        ],
        [
            'name' => 'ROCS roller',
            'image' => 'rocs.jpg',
            'description' => 'Quelques informations autour du sujet, liens, citations, annonces, etc. Habituellement c\'est contextuel au contenu principal (par exemple sur une page d\'informations, la barre latérale peut contenir la biographie de l\'auteur, ou des liens vers des articles connexes) mais il y a aussi des cas où vous trouverez des éléments récurrents comme un système de navigation secondaire.'
        ],
        [
            'name' => 'CERHA',
            'image' => 'cerha.jpg',
            'description' => 'Quelques informations autour du sujet, liens, citations, annonces, etc. Habituellement c\'est contextuel au contenu principal (par exemple sur une page d\'informations, la barre latérale peut contenir la biographie de l\'auteur, ou des liens vers des articles connexes) mais il y a aussi des cas où vous trouverez des éléments récurrents comme un système de navigation secondaire.'
        ],
        
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 3; $i++) {
            $project = new Project();
            $project->setName(self::PROJECTS[$i]['name']);
            $project->setImage(self::PROJECTS[$i]['image']);
            $project->setDate($faker->dateTime());
            $project->setDescription(self::PROJECTS[$i]['description']);
            copy(
                __DIR__ . '/' . self::PROJECTS[$i]['image'],
                __DIR__ . '/../../public/uploads/projects/' . self::PROJECTS[$i]['image']
            );
            $manager->persist($project);
        }

        $manager->flush();
    }
}
