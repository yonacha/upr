<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/3/2019
 * Time: 21:56
 */

namespace App\Entity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 * @UniqueEntity(fields={"title"}, message="Znajduje się już wpis o takim tytule")
 */
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=40, unique=true, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="text", length=1024, nullable=false)
     */
    private $description;

    /*
     *     minWidth = 200,
     *     maxWidth = 400,
     *     minHeight = 200,
     *     maxHeight = 400
     */
    /**
     * @Assert\Image(
     *
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * Many News has One User.
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="input_user_id", referencedColumnName="id", nullable=false)
     */
    private $inputUser;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $inputDate;

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
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return News
     */
    public function setTitle(string $title): News
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return News
     */
    public function setDescription(string $description): News
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param mixed $file
     * @return News
     */
    public function setImage($file = null): News
    {
        $this->image = $file;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
     * @return News
     */
    public function setInputUser(User $user): News
    {
        $this->inputUser = $user;

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
     * @return News
     */
    public function setInputDate(\DateTime $inputDate): News
    {
        $this->inputDate = $inputDate;

        return $this;
    }
}