<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/10/2019
 * Time: 21:13
 */

namespace App\Repository;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\UserScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UserScoreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserScore::class);
    }
}