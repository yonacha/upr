<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/11/2019
 * Time: 9:07
 */

namespace App\Controller;

use App\Entity\Level;
use App\Entity\News;
use App\Form\LevelType;
use App\Repository\LevelRepository;
use App\Service\PageTools\PageTool;
use App\Service\PageTools\PageToolContainer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
     * @param Request $request
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function game_add(Request $request, PageToolContainer $toolContainer, TranslatorInterface $translator, EntityManagerInterface $entityManager): Response
    {
        $toolContainer->addTool(new PageTool('admin_panel_show', $translator->trans('admin.panel')));

        $form = $this->createForm(LevelType::class, new Level());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $lvl = $form->getData();
            $entityManager->persist($lvl);
            $entityManager->flush();
            $this->addFlash('success', $translator->trans('city_game.added'));

            return $this->redirectToRoute('admin_panel_game');
        }
        return $this->render('admin/game_edit.html.twig', [
            'admin' => $this->getUser(),
            'tools' => $toolContainer->getTools(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/game/edit/{id}", name="admin_panel_game_edit", options={"expose"=true}, requirements={"id"="\d+"})
     * @param Level $level
     * @param Request $request
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function game_edit(Level $level, Request $request, PageToolContainer $toolContainer, TranslatorInterface $translator, EntityManagerInterface $entityManager): Response
    {
        $toolContainer->addTool(new PageTool('admin_panel_show', $translator->trans('admin.panel')));

        $form = $this->createForm(LevelType::class, $level);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $lvl = $form->getData();
            $entityManager->persist($lvl);
            $entityManager->flush();
            $this->addFlash('success', $translator->trans('city_game.added'));

            return $this->redirectToRoute('admin_panel_game');
        }
        return $this->render('Admin/game_edit.html.twig', [
            'admin' => $this->getUser(),
            'tools' => $toolContainer->getTools(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/news_delete/{id}", name="admin_panel_news_delete", options={"expose"=true}, requirements={"id"="\d+"})
     * @param News $news
     * @param EntityManagerInterface $entityManager
     * @param TranslatorInterface $translator
     * @return RedirectResponse
     */
    public function news_delete(News $news, EntityManagerInterface $entityManager, TranslatorInterface $translator): RedirectResponse
    {
        $entityManager->remove($news);
        $entityManager->flush();
        $this->addFlash('success', $translator->trans('news.removed'));

        return $this->redirectToRoute('newslist');
    }
}