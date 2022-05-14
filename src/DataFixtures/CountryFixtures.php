<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Repository\CountryRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CountryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default country
         */
        $tabcountry = [];
        $tabcountry = [
            ["Tous", "images/logo_ibu.svg.png"],
            ["Allemagne", "images/flag/Germany.svg.png"],
            ["Autriche", "images/flag/Austria.svg.png"],
            ["Bélarus", "images/flag/Belarus.svg.png"],
            ["Belgique", "images/flag/Belgique.svg.png"],
            ["Bulgarie", "images/flag/Bulgarie.svg.png"],
            ["Canada", "images/flag/Canada.svg.png"],
            ["Chine", "images/flag/China.svg.png"],
            ["Corée du Sud", "images/flag/SCoree.svg.png"],
            ["Croatie", "images/flag/Croatie.svg.png"],
            ["Estonie", "images/flag/Estonia.svg.png"],
            ["Finlande", "images/flag/Finland.svg.png"],
            ["France", "images/flag/France.svg.png"],
            ["Grande-Bretagne", "images/flag/Grande-Bretagne.svg.png"],
            ["Italie", "images/flag/Italy.svg.png"],
            ["Japon", "images/flag/Japon.svg.png"],
            ["Kazakhstan", "images/flag/Kazakhstan.svg.png"],
            ["Lettonie", "images/flag/Lettonie.svg.png"],
            ["Lituanie", "images/flag/Lituanie.svg.png"],
            ["Moldavie", "images/flag/Moldavie.svg.png"],
            ["Norvège", "images/flag/Norway.svg.png"],
            ["Nouvelle-Zélande", "images/flag/NZE.svg.png"],
            ["Pologne", "images/flag/Pologne.svg.png"],
            ["Roumanie", "images/flag/Roumanie.svg.png"],
            ["Russie", "images/flag/Russie.svg.png"],
            ["Slovaquie", "images/flag/Slovaquie.svg.png"],
            ["Slovènie", "images/flag/Slovenia.svg.png"],
            ["Suède", "images/flag/Sweden.svg.png"],
            ["Suisse", "images/flag/Suisse.svg.png"],
            ["Tchéquie", "images/flag/Tchequie.svg.png"],
            ["Ukraine", "images/flag/Ukraine.svg.png"],
            ["USA", "images/flag/USA.svg.png"],
                
        ];

        foreach ($tabcountry as list($a, $b)) {
            $country = new Country();
            $country->setName($a);
            $country->setFlag($b);
            $manager->persist($country);
            $this->addReference($country->getName(), $country);
        }
        unset($value, $tabcountry, $country);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
