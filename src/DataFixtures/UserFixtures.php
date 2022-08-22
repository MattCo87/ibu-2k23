<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture implements OrderedFixtureInterface
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $tabuser = [];
        $tabuser = [
            ["test@gmail.com", "ROLE_ADMIN", "testettestera", 100000],
        ];

        foreach ($tabuser as list($email, $role, $pwd, $purse)) {
            $user = new User();
            $password = $this->hasher->hashPassword($user, $pwd);
            $user
                ->setEmail($email)
                ->setRoles([$role])
                ->setPassword($password)
                ->setPurse($purse);
            $manager->persist($user);
        }
        unset($tabuser, $email, $role, $pwd);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
