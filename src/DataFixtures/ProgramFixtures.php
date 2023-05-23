<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMS = [
        'Walking dead',
        'Forrest Gump',
        'La Liste de Schindler',
        '12 hommes en colère',
        'La Liste de Schindler',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $programName) {
            $program = new Program();
            $program->setTitle($programName);
            $program->setSynopsis('Des zombies envahissent la terre');
            $program->setCategory($this->getReference('category_Action'));
            $program->setPoster('chemin/vers/votre/image.jpg');
            $manager->persist($program);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
