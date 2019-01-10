<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/7/2019
 * Time: 22:52
 */

namespace App\Service;


use App\Entity\News;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class LikeService
{
    /** @var string */
    private $userIdString;
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * LikeService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param News $news
     * @param User $user
     * @return bool
     */
    public function likeNews(News $news, User $user): bool
    {
        $this->userIdString = ';'.$user->getId().';';

        return $this->canLike($news);
    }

    /**
     * @param News $news
     * @return bool
     */
    public function canLike(News $news): bool
    {
        if (strpos($news->getUserLikes(), $this->userIdString) === false)
        {
            $news->addLikes();
            $news->addUserLikes($this->userIdString);
            $news->removeUserDislikes($this->userIdString);

            $this->entityManager->flush();

            return true;
        } else {

            return false;
        }
    }

    /**
     * @param News $news
     * @param User $user
     * @return bool
     */
    public function dislikeNews(News $news, User $user): bool
    {
        $this->userIdString = ';'.$user->getId().';';

        return $this->canDislike($news);
    }

    /**
     * @param News $news
     * @return bool
     */
    public function canDislike(News $news): bool
    {
        if (strpos($news->getUserDislikes(), $this->userIdString) === false) {
            $news->removeLikes();
            $news->addUserDislikes($this->userIdString);
            $news->removeUserLikes($this->userIdString);

            $this->entityManager->flush();

            return true;
        } else {

        return false;}
    }
}