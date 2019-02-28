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

class MedalsService
{
    /** @var UserScoreRepository  */
    private $userScorRepo;
    /** @var UserRepository  */
    private $userRepo;

    /**
     * CityGameService constructor.
     * @param UserScoreRepository $userScorRepo
     */
    public function __construct(UserRepository $userRepo, UserScoreRepository $userScorRepo)
    {
        $this->userScorRepo = $userScorRepo;
        $this->userRepo = $userRepo;
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


}