<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/10/2019
 * Time: 15:50
 */

namespace App\Service;


use App\Entity\Level;
use App\Entity\User;
use App\Entity\UserScore;
use App\Repository\LevelRepository;
use App\Repository\UserScoreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class LevelService
{
    /** @var LevelRepository */
    private $lvlRepo;
    /** @var UserScoreRepository */
    private $userScoreRepo;
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * LevelService constructor.
     * @param LevelRepository $lvlRepo
     * @param UserScoreRepository $userScoreRepo
     */
    public function __construct(LevelRepository $lvlRepo, UserScoreRepository $userScoreRepo, EntityManagerInterface $entityManager)
    {
        $this->lvlRepo = $lvlRepo;
        $this->userScoreRepo = $userScoreRepo;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Level $lvl
     * @return array
     */
    public function getChronoOptionsArr(Level $lvl): array
    {
        return explode(',', $lvl->getChronologyOptions());
    }

    /**
     * @param Level $lvl
     * @return array
     */
    public function getRadioOptionsArr(Level $lvl): array
    {
        return explode(',', $lvl->getRadioOptions());
    }

    /**
     * @param Level $lvl
     * @return array
     */
    public function getLvlTransofrmData(Level $lvl): array
    {
        return [
          'chrono_options' => $this->getChronoOptionsArr($lvl),
          'radio_options' => $this->getRadioOptionsArr($lvl)
        ];
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Level $level
     */
    public function save(Request $request, User $user, Level $level)
    {
        $userScore = $this->userScoreRepo->findOneBy(['level' => $level, 'user' => $user]);
        if ($userScore) {
            $this->entityManager->remove($userScore);
            $this->entityManager->flush();
        }
        $score = 0;
        if ($this->verifyChrono(explode(',', $level->getChronologyAnswer()), $request->get('task1'))) {
            $score+=10;
        }
        if ($this->verifyOptions($level->getRadioAnswer(), $request->get('task2'))) {
            $score+=10;
        }
        if ($this->verifyDate($level->getDateAnswer(), $request->get('task3'))) {
            $score+=10;
        }
        if ($this->verifyQuestion($level->getQuestionAnswer(), $request->get('task4'))) {
            $score+=10;
        }

        $userScore = new UserScore();
        $userScore->setLevel($level);
        $userScore->setUser($user);
        $userScore->setScore($score);
        $this->entityManager->persist($userScore);
        $this->entityManager->flush();
    }

    /**
     * @param array $answers
     * @param array $userAnswer
     * @return bool
     */
    public function verifyChrono(array $answers,array $userAnswer): bool
    {
        $trimChronoAnswer = array_map('trim', $answers);
        $trimAnswered = array_map('trim', $userAnswer);

        if ($trimChronoAnswer === $trimAnswered) {
            return true;
        }

        return false;
    }

    /**
     * @param string $optionsAnswer
     * @param string $answer
     * @return bool
     */
    public function verifyOptions(string $optionsAnswer, string $answer): bool
    {
        if (trim($optionsAnswer) === trim($answer)) {
            return true;
        }

        return false;
    }

    /**
     * @param \DateTime $dateAnswer
     * @param string $answer
     * @return bool
     */
    public function verifyDate(\DateTime $dateAnswer, string $answer): bool
    {
        if (date_format($dateAnswer, 'Y-m-d') === $answer) {
            return true;
        }

        return false;
    }

    /**
     * @param string $questionAnswer
     * @param string $answer
     * @return bool
     */
    public function verifyQuestion(string $questionAnswer, string $answer): bool
    {
        if (strtolower($questionAnswer) === strtolower($answer)) {
            return true;
        }

        return false;
    }
}