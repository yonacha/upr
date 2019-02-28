<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/3/2019
 * Time: 21:56
 */

namespace App\Entity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedalRepository")
 * @UniqueEntity(fields={"name"}, message="Znajduje się już medal o takiej nazwie")
 */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Mixed_;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

class Medal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */


    /**
     * @ORM\Column(type="string", length=40, unique=true, nullable=false)
     */
    private $name;

    /**
     * @return mixed
     */


    /**
     * @ORM\Column(type="string", length=500, nullable=false)
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
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @param mixed $neededPoints
     */
    public function setNeededPoints($neededPoints): void
    {
        $this->neededPoints = $neededPoints;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $neededPoints;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getNeededPoints()
    {
        return $this->neededPoints;
    }
}