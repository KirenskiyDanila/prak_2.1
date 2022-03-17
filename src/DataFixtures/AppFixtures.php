<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 20; $i++) {
            $student = new Student();
            $student->setName('Студент '. $i);
            $student->setPrice(mt_rand(10,100));
            $student->setCollegeGroup('Группа'.(mt_rand(1,10)));
            $student->setSurname('Фамилия'.$i);
            if ($i < 10) {
                $date = new \DateTime('2022-01-0'. $i .'T15:03:01.012345Z');
            }
            else {
                $date = new \DateTime('2022-01-'. $i .'T15:03:01.012345Z');    
            }
            $student->setBirthday($date);
            $manager->persist($student);
        }

        $manager->flush();
    }
}