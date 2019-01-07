<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/6/2019
 * Time: 23:07
 */

namespace App\Controller;


use App\Service\LikeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LikesController
 * @package App\Controller
 */
class LikesController extends AbstractController
{

    /**
     * @Route("/like/{id}", name="like_news", requirements={"id"="\d+"})
     */
    public function like(LikeService $service)
    {

    }

    /**
     * @Route("/dislike/{id}", name="like_news", requirements={"id"="\d+"})
     */
    public function dislike(LikeService $service)
    {

    }
}