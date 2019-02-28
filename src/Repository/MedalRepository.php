<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/3/2019
 * Time: 22:42
 */

namespace App\Repository;

use App\Entity\Medal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MedalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Medal::class);
    }

    public function findAllMedals()
    {
        return $this->findBy(array(), array('neededPoints' => 'ASC'));
    }

}