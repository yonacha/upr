<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 12/21/2018
 * Time: 2:31
 */

namespace App\Controller;

use App\Entity\Level;
use App\Repository\LevelRepository;
use App\Repository\UserScoreRepository;
use App\Service\CityGameService;
use App\Service\LevelService;
use App\Service\PageTools\PageTool;
use App\Service\PageTools\PageToolContainer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/city_game")
 *
 * Class CityGameController
 * @package App\Controller
 */
class CityGameController extends AbstractController
{
    /**
     * @Route("/show/{id}", name="citygameshow", defaults={"id" = 0}, requirements={"id"="\d+"}, options={"expose"=true})
     * @param int $id
     * @param LevelRepository $lvlRepo
     * @param LevelService $lvlService
     * @param UserScoreRepository $userScoreRepo
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function show(int $id, LevelRepository $lvlRepo, LevelService $lvlService, UserScoreRepository $userScoreRepo, PageToolContainer $toolContainer, TranslatorInterface $translator): Response
    {
        $toolContainer->addTool(new PageTool('citygame_rank', $translator->trans('city_game.score_board')));
        if ($this->getUser() && $lvlRepo->find($id)) {
            $lvl = $lvlRepo->find($id);
            $lvlTransData = $lvlService->getLvlTransofrmData($lvl);
        }
        if ($this->getUser()) {
            $scores = $userScoreRepo->findBy(['user' => $this->getUser()]);
            if ($scores) {
                $lvlsCompleted = $lvlService->getLvlsFromUserScores($userScoreRepo->findBy(['user' => $this->getUser()]));
            }
        }

        return $this->render('CityGame/show.html.twig', [
            'lvl' => $lvl ?? NULL,
            'lvls' => $lvlRepo->findAll() ?? NULL,
            'lvl_trans_data' => $lvlTransData ?? NULL,
            'tools' => $toolContainer->getTools(),
            'lvls_completed' => $lvlsCompleted ?? NULL
        ]);
    }

    /**
     * @Route("/save/{id}", requirements={"id"="\d+"}, name="citygame_save", options={"expose"=true})
     * @param Level $level
     * @param Request $request
     * @param LevelService $lvlService
     * @param TranslatorInterface $translator
     * @return JsonResponse
     */
    public function save(Level $level, Request $request, LevelService $lvlService, TranslatorInterface $translator)
    {
        if ($request->isXmlHttpRequest()) {
            $lvlService->save($request, $this->getUser(), $level);
        } else {
            return new JsonResponse('no');
        }

        $this->addFlash('success', $translator->trans('city_game.saved'));

        return new JsonResponse('citygameshow');
    }

    /**
     * @Route("/rank", name="citygame_rank", options={"expose"=true})
     * @param CityGameService $service
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @return Response
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function rank(CityGameService $service, PageToolContainer $toolContainer, TranslatorInterface $translator)
    {
        $rank = $service->getRanking();
        $toolContainer->addTool(new PageTool('citygameshow', $translator->trans('city_game.back_to_game')));

        return $this->render('CityGame/score_board.html.twig', [
            'rank' => $rank ?? NULL,
            'tools' => $toolContainer->getTools(),
        ]);
    }
}