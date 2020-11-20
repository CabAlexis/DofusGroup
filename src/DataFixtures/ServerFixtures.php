<?php

namespace App\DataFixtures;

use App\Entity\Server;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* ----------------
           |   SERVEURS   |
           ----------------
        */

        $server = new Server();
        $server->setName('Boune');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Crail');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Eratz');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Galgarion');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Henual');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Monocompte X');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Monocompte IX');
        $manager->persist($server);
        $manager->flush();

        $server = new Server();
        $server->setName('Monocompte VII');
        $manager->persist($server);
        $manager->flush();
    }
}
