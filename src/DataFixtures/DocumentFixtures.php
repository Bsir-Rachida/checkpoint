<?php

namespace App\DataFixtures;

use App\Entity\Document;
use Faker;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DocumentFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $document = new Document();
        $document->setName('Mon cv');
        $document->setfile('cv-bsir-rachida.pdf');
        copy(
            __DIR__ . '/cv-bsir-rachida.pdf',
            __DIR__ . '/../../public/uploads/documents/cv-bsir-rachida.pdf'
        );
        $manager->persist($document);

        $manager->flush();
    }
}
