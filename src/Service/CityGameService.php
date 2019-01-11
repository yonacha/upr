<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/11/2019
 * Time: 12:14
 */

namespace App\Service;


use App\Repository\UserRepository;
use App\Repository\UserScoreRepository;

class CityGameService
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
     * @return array
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getRanking(): array
    {
        $res = [];
        $users = $this->userRepo->findAll();
        foreach ($users as $user) {
            $points = $this->userScorRepo->getCountScoreByUser($user);
            if ($points) {
                $res[] = [$user->getName(), $points[1]];
            }
        }
        usort($res, function ($a, $b) {
            return $a[1] < $b[1];
        });

        return $res;
    }


}