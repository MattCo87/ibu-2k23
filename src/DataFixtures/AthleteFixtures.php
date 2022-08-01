<?php

namespace App\DataFixtures;

use App\Entity\Athlete;
use App\Repository\AthleteRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AthleteFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tabathlete = [];
        $tabathlete = [
            /*  Allemagne
                Femme
            */
            ["denise", "herrman", "Femme", "Allemagne", 589],
            ["vanessa", "voigt", "Femme", "Allemagne", 522],
            ["franziska", "preuss", "Femme", "Allemagne", 357],
            ["franziska", "hildebrand", "Femme", "Allemagne", 304],
            ["vanessa", "hinz", "Femme", "Allemagne", 262],
            ["janina", "hettich", "Femme", "Allemagne", 161],
            ["anna", "weidel", "Femme", "Allemagne", 72],

            /*  Homme
            */
            ["benedikt", "doll", "Homme", "Allemagne", 557],
            ["erik", "lesser", "Homme", "Allemagne", 535],
            ["johannes", "kuehn", "Homme", "Allemagne", 484],
            ["roman", "rees", "Homme", "Allemagne", 429],
            ["philipp", "nawrath", "Homme", "Allemagne", 410],
            ["david", "zobel", "Homme", "Allemagne", 171],
            ["philipp", "horn", "Homme", "Allemagne", 106],
            ["justus", "strelow", "Homme", "Allemagne", 47],
            ["lucas", "fratzscher", "Homme", "Allemagne", 34],

            /*  Autriche
                Femme
            */
            ["lisa theresa", "hauser", "Femme", "Autriche", 684],
            ["dunja", "zdouc", "Femme", "Autriche", 136],
            ["julia", "schwaiger", "Femme", "Autriche", 34],
            ["katharina", "innerhofer", "Femme", "Autriche", 10],
            ["christina", "rieder", "Femme", "Autriche", 5],

            /*  Homme
            */
            ["simon", "eder", "Homme", "Autriche", 431],
            ["felix", "leitner", "Homme", "Autriche", 315],
            ["david", "komatz", "Homme", "Autriche", 63],
            ["patrick", "jakob", "Homme", "Autriche", 4],

            /*  Bélarus
                Femme
            */
            ["dzinara", "alimbekava", "Femme", "Bélarus", 589],
            ["hanna", "sola", "Femme", "Bélarus", 420],
            ["iryna", "leschanka", "Femme", "Bélarus", 67],
            ["elena", "kruchinkina", "Femme", "Bélarus", 53],
            ["alina", "pilchuk", "Femme", "Bélarus", 1],

            /*  Homme
            */
            ["anton", "smolski", "Homme", "Bélarus", 404],
            ["dzmitry", "lazouski", "Homme", "Bélarus", 113],
            ["maksim", "varabei", "Homme", "Bélarus", 50],
            ["mikita", "labastau", "Homme", "Bélarus", 34],
            ["raman", "yaliotnau", "Homme", "Bélarus", 32],
            ["sergey", "bocharnikov", "Homme", "Bélarus", 8],

            /*  Belgique
                Femme
            */
            ["lie", "lotte", "Femme", "Belgique", 258],

            /*  Homme
            */
            ["florent", "claude", "Homme", "Belgique", 180],
            ["thierry", "langer", "Homme", "Belgique", 11],


            /*  Bulgarie
                Femme
            */
            ["milena", "todorova", "Femme", "Bulgarie", 97],

            /*  Homme
            */
            ["vladimir", "iliev", "Homme", "Bulgarie", 114],
            ["blagoy", "todev", "Homme", "Bulgarie", 1],


            /*  Canada
                Femme
            */
            ["emma", "lunder", "Femme", "Canada", 66],
            ["nadia", "moser", "Femme", "Canada", 21],
            ["megan", "bankes", "Femme", "Canada", 8],
            ["sarah", "beaudry", "Femme", "Canada", 2],

            /*  Homme
            */
            ["christian", "gow", "Homme", "Canada", 114],
            ["scott", "gow", "Homme", "Canada", 91],
            ["jules", "burnotte", "Homme", "Canada", 42],
            ["adam", "runnalls", "Homme", "Canada", 12],

            /*  Chine 
                Femme
            */
            ["yuanmeng", "chu", "Femme", "Chine", 37],
            ["fanqi", "meng", "Femme", "Chine", 36],
            ["yan", "zhang", "Femme", "Chine", 25],
            ["jialin", "tang", "Femme", "Chine", 12],

            /*  Homme
            */
            ["fangming", "cheng", "Homme", "Chine", 40],


            /*  Corée du Sud 
                Femme
            */
            ["ekaterina", "avvakumova", "Femme", "Corée du Sud", 27],

            /*  Homme
            */
            ["timofei", "lapshin", "Homme", "Corée du Sud", 43],


            /*  Croatie
              Homme
            */
            ["kresimir", "crnkovic", "Homme", "Croatie", 10],

            /*  Estonie
                Femme
            */
            ["tuuli", "tomingas", "Femme", "Estonie", 100],
            ["regina", "oja", "Femme", "Estonie", 15],
            ["johanna", "talihaerm", "Femme", "Estonie", 7],

            /*  Homme
            */
            ["rene", "zahkna", "Homme", "Estonie", 41],
            ["kalev", "ermits", "Homme", "Estonie", 22],

            /*  Finlande
                Femme
            */
            ["mari", "eder", "Femme", "Finlande", 260],
            ["suvi", "minkkinen", "Femme", "Finlande", 148],
            ["nastassia", "kinnunen", "Femme", "Finlande", 43],

            /*  Homme
            */
            ["tero", "seppala", "Homme", "Finlande", 468],
            ["olli", "hiidensalo", "Homme", "Finlande", 128],
            ["jaakko", "ranta", "Homme", "Finlande", 6],
            ["tuomas", "harjula", "Homme", "Finlande", 1],

            /*  France
                Femme
            */
            ["anais", "chevalier-bouchet", "Femme", "France", 642],
            ["justine", "braisaz-bouchet", "Femme", "France", 581],
            ["julia", "simon", "Femme", "France", 554],
            ["anais", "bescond", "Femme", "France", 515],
            ["chloe", "chevalier", "Femme", "France", 314],
            ["paula", "botet", "Femme", "France", 25],
            ["caroline", "colombo", "Femme", "France", 20],
            ["lou", "jeanmonnot", "Femme", "France", 10],

            /*  Homme
            */
            ["quentin", "fillon maillet", "Homme", "France", 984],
            ["emilien", "jacquelin", "Homme", "France", 706],
            ["simon", "desthieux", "Homme", "France", 590],
            ["fabien", "claude", "Homme", "France", 434],
            ["antonin", "guigonnat", "Homme", "France", 379],
            ["eric", "perrot", "Homme", "France", 43],
            ["emilien", "claude", "Homme", "France", 35],

            /*  Grande-Bretagne
                Femme
            */
            ["amanda", "lightfoot", "Femme", "Grande-Bretagne", 21],


            /*  Italie
                Femme
            */
            ["dorothea", "wierer", "Femme", "Italie", 577],
            ["lisa", "vittozzi", "Femme", "Italie", 246],
            ["federica", "sanfilippo", "Femme", "Italie", 33],
            ["samuela", "comola", "Femme", "Italie", 18],

            /*  Homme
            */
            ["lukas", "hofer", "Homme", "Italie", 404],
            ["thomas", "bormolini", "Homme", "Italie", 355],
            ["tommaso", "giacomel", "Homme", "Italie", 160],
            ["dominik", "windisch", "Homme", "Italie", 81],
            ["didier", "bionaz", "Homme", "Italie", 13],

            /*  Japon
                Femme
            */
            ["fuyuko", "tachizaki", "Femme", "Japon", 79],
            ["sari", "maeda", "Femme", "Japon", 22],

            /*  Homme
            */
            ["tsukasa", "kobonoki", "Homme", "Japon", 87],

            /*  Kazakhstan 
                Femme
            */
            ["galina", "vishnevskaya-sheporenko", "Femme", "Kazakhstan", 40],
            ["darya", "klimina", "Femme", "Kazakhstan", 15],
            ["yelizaveta", "belchenko", "Femme", "Kazakhstan", 14],

            /*  Homme
            */
            ["asset", "dyussenov", "Homme", "Kazakhstan", 5],
            ["alexandr", "mukhin", "Homme", "Kazakhstan", 4],


            /*  Lettonie
                Femme
            */
            ["baiba", "bendika", "Femme", "Lettonie", 152],


            /*  Lituanie
                Femme
            */
            ["gabriele", "lescinskaite", "Femme", "Lituanie", 22],

            /*  Homme
            */
            ["vytautas", "strolia", "Homme", "Lituanie", 352],

            /*  Moldavie
                Femme
            */
            ["alina", "stremous", "Femme", "Moldavie", 153],


            /*  Norvège
                Femme
            */
            ["marte olsbu", "roeiseland", "Femme", "Norvège", 957],
            ["tiril", "eckhoff", "Femme", "Norvège", 555],
            ["ingrid landmark", "tandrevold", "Femme", "Norvège", 470],
            ["karoline offigstad", "knotten", "Femme", "Norvège", 249],
            ["ida", "lien", "Femme", "Norvège", 187],
            ["emilie aagheim", "kalkenberg", "Femme", "Norvège", 81],
            ["karoline", "erdal", "Femme", "Norvège", 61],
            ["ragnhild", "femsteinevik", "Femme", "Norvège", 46],

            /*  Homme
            */
            ["sturla holm", "laegreid", "Homme", "Norvège", 736],
            ["vetle sjaastad", "christiansen", "Homme", "Norvège", 708],
            ["tarjei", "boe", "Homme", "Norvège", 601],
            ["sivert guttorm", "bakken", "Homme", "Norvège", 553],
            ["johannes thingnes", "boe", "Homme", "Norvège", 440],
            ["filip fjeld", "andersen", "Homme", "Norvège", 403],
            ["aleksander fjeld", "andersen", "Homme", "Norvège", 165],
            ["erlend", "bjoentegaard", "Homme", "Norvège", 101],
            ["sverre dahlen", "aspenes", "Homme", "Norvège", 61],
            ["johannes", "dale", "Homme", "Norvège", 54],
            ["martin", "uldal", "Homme", "Norvège", 35],

            /*  Nouvelle-Zélande
                Homme
            */
            ["campbell", "wright", "Homme", "Nouvelle-Zélande", 55],

            /*  Pologne
                Femme
            */
            ["monika", "hojnisz-starega", "Femme", "Pologne", 153],
            ["kamila", "zuk", "Femme", "Pologne", 41],
            ["anna", "maka", "Femme", "Pologne", 37],

            /*  Homme
            */
            ["grzegorz", "guzik", "Homme", "Pologne", 13],

            /*  Roumanie 
                Femme
            */
            ["natalia", "ushkina", "Femme", "Roumanie", 28],

            /*  Homme
            */
            ["george", "buta", "Homme", "Roumanie", 11],

            /*  Russie
                Femme
            */
            ["kristina", "reztsova", "Femme", "Russie", 366],
            ["uliana", "nigmatullina", "Femme", "Russie", 285],
            ["svetlana", "mironova", "Femme", "Russie", 197],
            ["irina", "kazakevich", "Femme", "Russie", 189],
            ["valeriia", "vasnetcova", "Femme", "Russie", 153],
            ["larisa", "kuklina", "Femme", "Russie", 18],

            /*  Homme
            */
            ["alexandr", "loginov", "Homme", "Russie", 413],
            ["eduard", "latypov", "Homme", "Russie", 348],
            ["said karimulla", "khalili", "Homme", "Russie", 222],
            ["daniil", "serokhvostov", "Homme", "Russie", 199],
            ["anton", "babikov", "Homme", "Russie", 160],
            ["alexander", "povarnitsyn", "Homme", "Russie", 114],
            ["maksim", "tsvetkov", "Homme", "Russie", 114],
            ["vasilii", "tomshin", "Homme", "Russie", 56],
            ["matvei", "eliseev", "Homme", "Russie", 11],


            /*  Slovaquie
                Femme
            */
            ["paulina", "fialkova", "Femme", "Slovaquie", 305],
            ["ivona", "fialkova", "Femme", "Slovaquie", 94],

            /*  Homme
            */
            ["michal", "sima", "Homme", "Slovaquie", 4],

            /*  Slovènie
                Femme
            */
            ["polona", "klemencic", "Femme", "Slovènie", 8],

            /*  Homme
            */
            ["jakov", "fak", "Homme", "Slovènie", 99],
            ["miha", "dovzan", "Homme", "Slovènie", 26],
            ["klemen", "bauer", "Homme", "Slovènie", 12],
            ["rok", "trsan", "Homme", "Slovènie", 7],
            ["lovro", "planko", "Homme", "Slovènie", 2],

            /*  Suède
                Femme
            */
            ["elvira", "oeberg", "Femme", "Suède", 823],
            ["hanna", "oeberg", "Femme", "Suède", 661],
            ["mona", "brorsson", "Femme", "Suède", 442],
            ["linn", "persson", "Femme", "Suède", 416],
            ["stina", "nilsson", "Femme", "Suède", 249],
            ["anna", "magnusson", "Femme", "Suède", 207],
            ["emma", "nilsson", "Femme", "Suède", 18],
            ["johanna", "skottheim", "Femme", "Suède", 9],

            /*  Homme
            */
            ["sebastian", "samuelsson", "Homme", "Suède", 717],
            ["peppe", "femling", "Homme", "Suède", 105],
            ["jesper", "nelin", "Homme", "Suède", 87],
            ["malte", "stefansson", "Homme", "Suède", 11],
            ["oskar", "brandt", "Homme", "Suède", 4],

            /*  Suisse
                Femme
            */
            ["lena", "haecki", "Femme", "Suisse", 240],
            ["elisa", "gasparin", "Femme", "Suisse", 71],
            ["aita", "gasparin", "Femme", "Suisse", 69],
            ["amy", "baserga", "Femme", "Suisse", 33],
            ["selena", "gasparin", "Femme", "Suisse", 7],

            /*  Homme
            */
            ["benjamin", "weger", "Homme", "Suisse", 339],
            ["sebastian", "stalder", "Homme", "Suisse", 119],
            ["joscha", "burkhalter", "Homme", "Suisse", 71],
            ["niklas", "hartweg", "Homme", "Suisse", 40],
            ["martin", "jaeger", "Homme", "Suisse", 21],


            /*  Tchéquie
                Femme
            */
            ["marketa", "davidova", "Femme", "Tchéquie", 560],
            ["jessica", "jislova", "Femme", "Tchéquie", 441],
            ["tereza", "vobornikova", "Femme", "Tchéquie", 40],
            ["lucie", "charvatova", "Femme", "Tchéquie", 33],
            ["eva", "puskarcikova", "Femme", "Tchéquie", 30],
            ["tereza", "vinklarkova", "Femme", "Tchéquie", 12],
            ["eliska", "tepla", "Femme", "Tchéquie", 5],

            /*  Homme
            */
            ["michal", "krcmar", "Homme", "Tchéquie", 332],
            ["adam", "vaclavik", "Homme", "Tchéquie", 88],
            ["jakub", "stvrtecky", "Homme", "Tchéquie", 77],
            ["mikulas", "karlik", "Homme", "Tchéquie", 2],


            /*  Ukraine
                Femme
            */
            ["yuliia", "dzhima", "Femme", "Ukraine", 153],
            ["olena", "bilosiuk", "Femme", "Ukraine", 103],
            ["darya", "blashko", "Femme", "Ukraine", 72],
            ["valentina", "semerenko", "Femme", "Ukraine", 60],
            ["iryna", "petrenko", "Femme", "Ukraine", 17],
            ["anastasiya", "merkushyna", "Femme", "Ukraine", 4],

            /*  Homme
            */
            ["dmytro", "pidruchnyi", "Homme", "Ukraine", 148],
            ["anton", "dudchenko", "Homme", "Ukraine", 126],
            ["bogdan", "tsymbal", "Homme", "Ukraine", 64],
            ["artem", "pryma", "Homme", "Ukraine", 43],

            /*  USA
                Femme
            */
            ["egan", "clare", "Femme", "USA", 120],
            ["deedra", "irwin", "Femme", "USA", 61],
            ["susan", "dunklee", "Femme", "USA", 31],
            ["joanne", "reid", "Femme", "USA", 24],

            /*  Homme
            */
            ["paul", "schommer", "Homme", "USA", 114],
            ["jake", "brown", "Homme", "USA", 100],
            ["sean", "doherty", "Homme", "USA", 78],
            ["leif", "nordgren", "Homme", "USA", 2],
        ];

        foreach ($tabathlete as list($firstName, $lastName, $gender, $country, $total22)) {
            $athlete = new Athlete();
            $athlete
                ->setFirstName($firstName)
                ->setLastName($lastName)
                ->setCltG2022($total22)
                ->setGender($this->getReference($gender))
                ->setCountry($this->getReference($country));
            $manager->persist($athlete);
        }
        unset($tabathlete, $firstName, $lastName, $gender, $country, $athlete);

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}
