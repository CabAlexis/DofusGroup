<?php

namespace App\DataFixtures;

use App\Entity\Element;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ElementsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* ----------------
           |   ELEMENTS   |
           ----------------
        */

        $element = new Element();
        $element->setName('Feu');
        $manager->persist($element);
        $manager->flush();

        $element = new Element();
        $element->setName('Terre');
        $manager->persist($element);
        $manager->flush();

        $element = new Element();
        $element->setName('Agilité');
        $manager->persist($element);
        $manager->flush();

        $element = new Element();
        $element->setName('Eau');
        $manager->persist($element);
        $manager->flush();

        $element = new Element();
        $element->setName('Sagesse');
        $manager->persist($element);
        $manager->flush();
    }
}
