<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/11/2019
 * Time: 9:07
 */

namespace App\Controller;

use App\Repository\LevelRepository;
use App\Service\PageTools\PageTool;
use App\Service\PageTools\PageToolContainer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/admin_panel")
 * Class AdminPanel
 * @package App\Controller
 */
class AdminPanelController extends AbstractController
{
    /**
     * @Route("/show", name="admin_panel_show", options={"expose"=true})
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function show(PageToolContainer $toolContainer, TranslatorInterface $translator): Response
    {
        $toolContainer->addTool(new PageTool('admin_panel_game', $translator->trans('city_game.gmae_config')));

        return $this->render('admin/show.html.twig', [
            'admin' => $this->getUser(),
            'tools' => $toolContainer->getTools(),
        ]);
    }

    /**
     * @Route("/game", name="admin_panel_game", options={"expose"=true})
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @param LevelRepository $lvlRepo
     * @return Response
     */
    public function game(PageToolContainer $toolContainer, TranslatorInterface $translator, LevelRepository $lvlRepo): Response
    {
        $toolContainer->addTool(new PageTool('admin_panel_show', $translator->trans('admin.panel')));
        $toolContainer->addTool(new PageTool('admin_panel_game_new', $translator->trans('city_game.add_new')));

        return $this->render('admin/game.html.twig', [
            'admin' => $this->getUser(),
            'tools' => $toolContainer->getTools(),
            'lvls' => $lvlRepo->findAll() ?? NULL,
        ]);
    }

    /**
     * @Route("/game/new", name="admin_panel_game_new", options={"expose"=true})
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function game_add(PageToolContainer $toolContainer, TranslatorInterface $translator): Response
    {
        $toolContainer->addTool(new PageTool('admin_panel_show', $translator->trans('admin.panel')));

        $form = $this->createForm(NewsType::class, new News());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }
        return $this->render('admin/game_edit.html.twig', [
            'admin' => $this->getUser(),
            'tools' => $toolContainer->getTools(),
            'form' => $form->createView(),
        ]);
    }
}