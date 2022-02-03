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
            'description' => 'Quelques informations autour du sujet, liens, citations, annonces, etc. Habituellement c\'est contextuel au contenu principal (par exemple sur une page d\'informations, la barre latérale peut contenir la biographie de l\'auteur, ou des liens vers des articles connexes) mais il y a aussi des cas où vous trouverez des éléments récurrents comme un système de navigation secondaire.',
            'url' =>'https://github.com/Bsir-Rachida/Projet-dracula',
        ],
        [
            'name' => 'ROCS roller',
            'image' => 'rocs.jpg',
            'description' => 'Quelques informations autour du sujet, liens, citations, annonces, etc. Habituellement c\'est contextuel au contenu principal (par exemple sur une page d\'informations, la barre latérale peut contenir la biographie de l\'auteur, ou des liens vers des articles connexes) mais il y a aussi des cas où vous trouverez des éléments récurrents comme un système de navigation secondaire.',
            'url' =>'https://orleans-projet2-rocs.phprover.wilders.dev/',
        ],
        [
            'name' => 'CERHA',
            'image' => 'cerha.jpg',
            'description' => 'Quelques informations autour du sujet, liens, citations, annonces, etc. Habituellement c\'est contextuel au contenu principal (par exemple sur une page d\'informations, la barre latérale peut contenir la biographie de l\'auteur, ou des liens vers des articles connexes) mais il y a aussi des cas où vous trouverez des éléments récurrents comme un système de navigation secondaire.',
            'url' =>'https://orleans-cerha.phprover.wilders.dev/',
        ],
        
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        foreach (self::PROJECTS as $key => $data) {
            $project = new Project();
            $project->setName($data['name']);
            $project->setImage($data['image']);
            $project->setUrl($data['url']);
            $project->setDate($faker->dateTime());
            $project->setDescription($data['description']);
            
           
            copy(
                __DIR__ . '/' .$data['image'],
                __DIR__ . '/../../public/uploads/projects/' .$data['image']
            );
            $manager->persist($project);
        }

        $manager->flush();
    }
}
