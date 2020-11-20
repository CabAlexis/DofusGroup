<?php

namespace App\DataFixtures;

use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RacesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* ----------------
           |   CLASSES    |
           ----------------
        */

        $race = new Race();
        $race->setName('Cra');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Eniripsa');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Féca');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Osamodas');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Sacrieur');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Sram');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Ecaflip');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Enutrof');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Iop');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Pandawa');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Sadida');
        $manager->persist($race);
        $manager->flush();

        $race = new Race();
        $race->setName('Xélor');
        $manager->persist($race);
        $manager->flush();
    }
}
