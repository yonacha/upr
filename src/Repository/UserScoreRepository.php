<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/10/2019
 * Time: 21:13
 */

namespace App\Repository;

use App\Entity\User;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\UserScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UserScoreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserScore::class);
    }

    /**
     * @param User $user
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCountScoreByUser(User $user)
    {
        return $this->createQueryBuilder('user_score')
            ->select('sum(user_score.score)')
            ->groupBy('user_score.user')
            ->where('user_score.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult();
    }
}