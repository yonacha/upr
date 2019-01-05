<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/5/2019
 * Time: 19:57
 */

namespace App\Service;


use App\Repository\NewsRepository;

class NewsService
{
    /** @var NewsRepository  */
    private $newsRepo;

    /**
     * NewsService constructor.
     * @param NewsRepository $newsRepo
     */
    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    /**
     * @return array
     */
    public function getAllNews(): array
    {
        return $this->newsRepo->findAll();
    }
}