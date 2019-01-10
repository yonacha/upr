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
     * @ORM\Column(type="integer", nullable=false)
     */
    private $position;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $long;

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
    private $date;

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
    private $question;

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
     * @return int
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return Level
     */
    public function setPosition(int $position): Level
    {
        $this->position = $position;

        return $this;
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
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return Level
     */
    public function setLat(float $lat): Level
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLong(): ?float
    {
        return $this->long;
    }

    /**
     * @param float $long
     * @return Level
     */
    public function setLong(float $long): Level
    {
        $this->long = $long;

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
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
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
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * @param string $question
     * @return Level
     */
    public function setQuestion(string $question): Level
    {
        $this->question = $question;

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