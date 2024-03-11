<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle("Heat");
        $movie->setReleaseYear(1995);
        $movie->setDescription("Description text");
        $movie->setImagePath("https://upload.wikimedia.org/wikipedia/en/6/6c/Heatposter.jpg");

        // add data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);
        $manager->flush();

    }
}
