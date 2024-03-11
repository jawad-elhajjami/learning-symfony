<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor = new Actor();
        $actor->setName("Robert Di Nero");

        $actor2 = new Actor();
        $actor2->setName("Alpacino");

        $manager->persist($actor);
        $manager->persist($actor2);
        
        $manager->flush();
        $this->addReference('actor_1',$actor);
        $this->addReference('actor_2',$actor2);
    }
}
