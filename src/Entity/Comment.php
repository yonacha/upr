<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/6/2019
 * Time: 12:34
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=1024, nullable=false)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $inputDate;

    /**
     * Many Comment has One News.
     * @ORM\ManyToOne(targetEntity="News", inversedBy="comments")
     * @ORM\JoinColumn(name="news_id", referencedColumnName="id")
     */
    private $news;

    /**
     * Many Comment has One User.
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $inputUser;

    public function __construct()
    {
        $this->setInputDate(new \DateTime());
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInputDate(): \DateTime
    {
        return $this->inputDate;
    }

    /**
     * @param \DateTime $inputDate
     * @return Comment
     */
    public function setInputDate(\DateTime $inputDate): Comment
    {
        $this->inputDate = $inputDate;

        return $this;
    }

    /**
     * @return News|null
     */
    public function getNews(): ?News
    {
        return $this->news;
    }

    /**
     * @param News $news
     * @return Comment
     */
    public function setNews(News $news): Comment
    {
        $this->news = $news;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getInputUser(): ?User
    {
        return $this->inputUser;
    }

    /**
     * @param User $user
     * @return Comment
     */
    public function setInputUser(User $user): Comment
    {
        $this->inputUser = $user;

        return $this;
    }
}