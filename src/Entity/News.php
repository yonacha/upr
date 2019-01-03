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

class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40, unique=true, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="text", length=1024, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * One News has One User.
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="input_user_id", referencedColumnName="id", nullable=false)
     */
    private $inputUser;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
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
     * @return string
     */
    public function getDescription(): string
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
     * @return null|string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param null|string $image
     * @return News
     */
    public function setImage(?string $image): News
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return User
     */
    public function getInputUser(): User
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
    }
}