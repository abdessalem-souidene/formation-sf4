<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UserFixtures extends Fixture
{
    private UserAuthenticatorInterface $encoder;

    /**
     * @param UserAuthenticatorInterface $encoder
     * @return void
     */
    public function _construct(UserAuthenticatorInterface $encoder)
    {
       $this->encoder =$encoder;
    }
    public function load(ObjectManager $manager): void
    {
       $user = new User();
       $user->setUsername('demo');
       $user->setPassword( $this->encoder->encoderPassword($user,'demo'));
       $manager->persist($user);
        $manager->flush();
    }
}
