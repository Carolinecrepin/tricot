<?php

namespace App\DataFixtures;

use App\Entity\Modele;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModeleFixtures extends Fixture
{
    const MODELES = [
        'chale trendy femme'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::MODELES as $key => $modeleName) {  
            $modele = new Modele();
            $modele->setCategory($this->getReference('category_0'));
            $modele->setName($modeleName);
            $modele->setDescription('modele de tricot');
            $modele->setExplication('Le modèle se tricote avec des aiguilles numéro 4');
            $modele->setPhoto('https://www.atelierdelacreation.com/img/cms/trendy%20ch%C3%A2le%20Loving%20Embrace%20de%20Drops/chale-loving-embrace-drops-modele.jpg');
            $manager->persist($modele);
            $this->addReference('modele_' . $key, $modele);

            $manager->persist($modele);
        }  
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}
