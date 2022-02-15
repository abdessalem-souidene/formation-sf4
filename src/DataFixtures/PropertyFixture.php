<?php
namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {  $faker = Factory::create('fr_FR');
       for ($i = 0; $i < 100; $i++) {
           $property = new Property();
           $property
               ->setTitle($faker->words(nb:3, asText:true))
               ->setDescription($faker->sentences(nb:3, asText: true))
               ->setSurface($faker->numberBetween(20, 350))
               ->setRooms($faker->numberBetween(1, 9))
               ->setFloor($faker->numberBetween(0, 15))
               ->setPrice($faker->numberBetween(10, 1000 ))
               ->setHeat($faker->numberBetween(0, count(Var: Property::HEAT) - 1))
               ->setCity($faker->city)
               ->setAddress($faker->adresse)
               ->setPostalCode($faker->postcode)
               ->setSolde(sold:false);

       }
           $manager->flush();

    }
}