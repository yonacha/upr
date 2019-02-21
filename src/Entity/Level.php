<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/10/2019
 * Time: 14:28
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LevelRepository")
 */
class Level
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $latt;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $longg;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $lvlLabel;

    /**
     * @ORM\Column(type="string", length=2048, nullable=false)
     */
    private $lvlDescr;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $chronologyLabel;

    /**
     * @ORM\Column(type="string", length=2048, nullable=false)
     */
    private $chronologyOptions;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $chronologyAnswer;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $optionsLabel;

    /**
     * @ORM\Column(type="string", length=2048, nullable=false)
     */
    private $radioOptions;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $radioAnswer;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     */
    private $dateLabel;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateAnswer;

    /**
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $questionLabel;

    /**
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $questionAnswer;

    /**
     * One Level has Many UserScore.
     * @ORM\OneToMany(targetEntity="UserScore", mappedBy="level")
     */
    private $userScores;

    public function __construct()
    {
        $this->userScores = new ArrayCollection();
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
    public function getChronologyOptions(): ?string
    {
        return $this->chronologyOptions;
    }

    /**
     * @param string $options
     * @return Level
     */
    public function setChronologyOptions(string $options): Level
    {
        $this->chronologyOptions = $options;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getChronologyAnswer(): ?string
    {
        return $this->chronologyAnswer;
    }

    /**
     * @param string $answer
     * @return Level
     */
    public function setChronologyAnswer(string $answer): Level
    {
        $this->chronologyAnswer = $answer;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRadioOptions(): ?string
    {
        return $this->radioOptions;
    }

    /**
     * @param string $options
     * @return Level
     */
    public function setRadioOptions(string $options): Level
    {
        $this->radioOptions = $options;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRadioAnswer(): ?string
    {
        return $this->radioAnswer;
    }

    /**
     * @param string $answer
     * @return Level
     */
    public function setRadioAnswer(string $answer): Level
    {
        $this->radioAnswer = $answer;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getChronologyLabel(): ?string
    {
        return $this->chronologyLabel;
    }

    /**
     * @param string $label
     * @return Level
     */
    public function setChronologyLabel(string $label): Level
    {
        $this->chronologyLabel = $label;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOptionsLabel(): ?string
    {
        return $this->optionsLabel;
    }

    /**
     * @param string $label
     * @return Level
     */
    public function setOptionsLabel(string $label): Level
    {
        $this->optionsLabel = $label;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLatt(): ?float
    {
        return $this->latt;
    }

    /**
     * @param float $lat
     * @return Level
     */
    public function setLatt(float $lat): Level
    {
        $this->latt = $lat;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongg(): ?float
    {
        return $this->longg;
    }

    /**
     * @param float $long
     * @return Level
     */
    public function setLongg(float $long): Level
    {
        $this->longg = $long;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLvlLabel(): ?string
    {
        return $this->lvlLabel;
    }

    /**
     * @param string $label
     * @return Level
     */
    public function setLvlLabel(string $label): Level
    {
        $this->lvlLabel = $label;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLvlDescr(): ?string
    {
        return $this->lvlDescr;
    }

    /**
     * @param string $descr
     * @return Level
     */
    public function setLvlDescr(string $descr): Level
    {
        $this->lvlDescr = $descr;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDateLabel(): ?string
    {
        return $this->dateLabel;
    }


    /**
     * @param string $label
     * @return Level
     */
    public function setDateLabel(string $label): Level
    {
        $this->dateLabel = $label;

        return $this;
    }


    /**
     * @param \DateTime $date
     * @return Level
     */
    public function setDate(\DateTime $date): Level
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateAnswer(): ?\DateTime
    {
        return $this->dateAnswer;
    }

    /**
     * @param \DateTime $date
     * @return Level
     */
    public function setDateAnswer(\DateTime $date): Level
    {
        $this->dateAnswer = $date;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getQuestionLabel(): ?string
    {
        return $this->questionLabel;
    }

    /**
     * @param string $label
     * @return Level
     */
    public function setQuestionLabel(string $label): Level
    {
        $this->questionLabel = $label;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getQuestionAnswer(): ?string
    {
        return $this->questionAnswer;
    }

    /**
     * @param string $answer
     * @return Level
     */
    public function setQuestionAnswer(string $answer): Level
    {
        $this->questionAnswer = $answer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserScores()
    {
        return $this->userScores;
    }

    /**
     * @param UserScore $userScore
     * @return Level
     */
    public function addUserScores(UserScore $userScore): Level
    {
        $this->userScores->add($userScore);

        return $this;
    }
}