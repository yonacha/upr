<?php
/**
 * Created by PhpStorm.
 * User: zioma
 * Date: 28.02.2019
 * Time: 21:13
 */

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\UserScoreRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class UserPanelService
{
    /** @var UserScoreRepository  */
    private $userScorRepo;
    /** @var UserRepository  */
    private $userRepo;
    /** @var EntityManagerInterface */
    private $entityManager;
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    /**
     * CityGameService constructor.
     * @param UserScoreRepository $userScorRepo
     */
    public function __construct(UserRepository $userRepo, UserScoreRepository $userScorRepo, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->userScorRepo = $userScorRepo;
        $this->userRepo = $userRepo;
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;

    }

    /**
     * @param Request $request
     * @param User $user
     * @param UserPasswordEncoderInterface $passwordEncoder
     * */

    public function savePassword(User $user, Request $request){
        if(isset($user)) {
            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    $request->get('password')
                ));
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }
    }

    public function saveEmail(User $user, Request $request){
        $user->setEmail($request->get('email'));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function saveName(User $user, Request $request){
        $user->setName($request->get('name'));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

}