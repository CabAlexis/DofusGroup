<?php

namespace App\DataFixtures;

use App\Entity\Dungeon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DungeonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* ----------------
           |   DONJONS    |
           ----------------
        */
        // DONJON INCARNAM

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Incarnam');
        $manager->flush();

        //DONJON ASTRUB

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Ensablé');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Bouftou');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Champs');
        $manager->persist($dungeon);
        $manager->flush();

        //DONJON AMAKNA

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Squelettes');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Forgeron');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Scara');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Tofus');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Tofu Royal');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Larves');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Craqueleur');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Bwork');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Gelée');
        $manager->persist($dungeon);
        $manager->flush();

        //DONJON NOEL

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Noel 1');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Noel 2');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Noel 3');
        $manager->persist($dungeon);
        $manager->flush();

        //DONJON BLOP 

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Blop');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Blop Multicolore');
        $manager->persist($dungeon);
        $manager->flush();

        //ILE DE MOON

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Moon');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Chouque');
        $manager->persist($dungeon);
        $manager->flush();

        //ILE WABBIT

        $dungeon = new Dungeon();
        $dungeon->setName('Chateau Wabbit (pour les items)');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Terrier Wabbit (pour le dofus Cawotte)');
        $manager->persist($dungeon);
        $manager->flush();

        //DONJON RATS

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Rat Blanc');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Rat Noir');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Sphincter Cell');
        $manager->persist($dungeon);
        $manager->flush();

        // DONJON PANDALA

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Bulbes');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Kitsoune');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Pandikaze');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Firefoux');
        $manager->persist($dungeon);
        $manager->flush();

        // DONJON ABRA

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Abraknyde');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Chene Mou');
        $manager->persist($dungeon);
        $manager->flush();

        // MAITRE CORBAC

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Maitre Corbac');
        $manager->persist($dungeon);
        $manager->flush();

        // DONJON OTOMAI
        $dungeon = new Dungeon();
        $dungeon->setName('Grotte Hesque');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Arche d\'Otomai');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Goulet du Rasboul');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Laboratoire du Tynril');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Canopée du Kimbo');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Antre du kralamour');
        $manager->persist($dungeon);
        $manager->flush();

        // DONJON KOALAK

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Familier');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Koulosse');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Repére Skeunk');
        $manager->persist($dungeon);
        $manager->flush();

        // DONJON DRAG ET DC

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Dragon Cochon');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Dragoeuf');
        $manager->persist($dungeon);
        $manager->flush();

        // DONJON LANDE SIDIMOTE

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Canidés');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Bworker');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Fungus');
        $manager->persist($dungeon);
        $manager->flush();

        // ILE MINO

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Minotoror');
        $manager->persist($dungeon);
        $manager->flush();

        $dungeon = new Dungeon();
        $dungeon->setName('Donjon Minotot');
        $manager->persist($dungeon);
        $manager->flush();

        // DIVERS

        $dungeon = new Dungeon();
        $dungeon->setName('Le Dark Vlad');
        $manager->persist($dungeon);
        $manager->flush();
    }
}
