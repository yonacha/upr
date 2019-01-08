<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/6/2019
 * Time: 23:07
 */

namespace App\Controller;


use App\Entity\News;
use App\Service\LikeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LikesController
 * @package App\Controller
 */
class LikesController extends AbstractController
{

    /**
     * @Route("/like/{id}", name="like_news", requirements={"id"="\d+"}, options={"expose"=true})
     * @param LikeService $service
     * @return JsonResponse
     */
    public function like(LikeService $service, News $news): JsonResponse
    {
        return new JsonResponse($service->likeNews($news, $this->getUser()));
    }

    /**
     * @Route("/dislike/{id}", name="dislike_news", requirements={"id"="\d+"}, options={"expose"=true})
     * @param LikeService $service
     * @param News $news
     * @return JsonResponse
     */
    public function dislike(LikeService $service, News $news): JsonResponse
    {
        return new JsonResponse($service->dislikeNews($news, $this->getUser()));

    }
}