<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 12/21/2018
 * Time: 2:21
 */

namespace App\Controller;

use App\Entity\Medal;
use App\Repository\MedalRepository;
use App\Service\MedalsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserScoreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("/order")
 *
 * Class MedalsController
 * @package App\Controller
 */
class MedalsController extends AbstractController
{
    /**
     * @Route("/show", name="medalshow")
     * @param UserScoreRepository $userScoreRepo
     * @param Request $request
     * @return Response
     */
    public function show(MedalsService $service, Request $request, MedalRepository $medalRepo): Response
    {
        $medals = $medalRepo -> findAllMedals();

        if ($this->getUser()) {
            $score = $service->getScore($this->getUser());
        }


        return $this->render('Medals/show.html.twig' , [
            'score' => $score ?? NULL,
            'medals' => $medals ?? NULL
        ]);
    }

    /**
     * @Route("/save/{id}", requirements={"id"="\d+"}, name="medal_save", options={"expose"=true})
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request, MedalsService $medalsService)
    {
        if ($request->isXmlHttpRequest()) {
            $medalsService->saveOrder($this->getUser(),$request);
        } else {
            return new JsonResponse('no');
        }


        return new JsonResponse('medalsshow');
    }

}