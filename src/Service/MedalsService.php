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


class MedalsService
{
    /** @var UserScoreRepository  */
    private $userScorRepo;
    /** @var UserRepository  */
    private $userRepo;
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * CityGameService constructor.
     * @param UserScoreRepository $userScorRepo
     */
    public function __construct(UserRepository $userRepo, UserScoreRepository $userScorRepo, EntityManagerInterface $entityManager)
    {
        $this->userScorRepo = $userScorRepo;
        $this->userRepo = $userRepo;
        $this->entityManager = $entityManager;

    }

    /**
     * @param UserScoreRepository
     * @param User $user
     * @return array
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */

    public function getScore(User $user): ?array {
        $points = $this->userScorRepo->getCountScoreByUser($user);

        return $points ?? NULL;
    }

    /**
     * @param Request $request
     * @param User $user
     * */

    public function saveOrder(User $user, Request $request){
        $user->setChosenOrder($request->get('id'));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

}