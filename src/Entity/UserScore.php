<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/10/2019
 * Time: 21:10
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserScoreRepository")
 */
class UserScore
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many UserScore has One User.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userScores")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Many UserScore has One User.
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="userScores")
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $level;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $score;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return UserScore
     */
    public function setUser(User $user): UserScore
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Level|null
     */
    public function getLevel(): ?Level
    {
        return $this->level;
    }

    /**
     * @param Level $level
     * @return UserScore
     */
    public function setLevel(Level $level): UserScore
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    /**
     * @param int $score
     * @return UserScore
     */
    public function setScore(int $score): UserScore
    {
        $this->score = $score;

        return $this;
    }
}