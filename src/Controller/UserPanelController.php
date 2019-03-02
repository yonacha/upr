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
use App\Entity\User;
use App\Form\LevelType;
use App\Repository\UserRepository;
use App\Service\PageTools\PageTool;
use App\Service\PageTools\PageToolContainer;
use App\Service\UserPanelService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/user_panel")
 * Class UserPanel
 * @package App\Controller
 */
class UserPanelController extends AbstractController
{
    /**
     * @Route("/show", name="user_panel_show", options={"expose"=true})
     * @return Response
     */
    public function show(PageToolContainer $toolContainer, TranslatorInterface $translator): Response
    {
        return $this->render('User/show.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/showPassword", name="user_panel_password", options={"expose"=true})
     * @return Response
     */
    public function showPassword(){

        return $this->render('User/password.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
    /**
     * @Route("/showName", name="user_panel_name", options={"expose"=true})
     * @return Response
     */
    public function showName(){

        return $this->render('User/name.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
    /**
     * @Route("/showEmail", name="user_panel_email", options={"expose"=true})
     * @return Response
     */
    public function showEmail(){

        return $this->render('User/email.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @param User user
     * @Route("/user/changepassword", name="user_change_password", options={"expose"=true})
     * @param UserPanelService
     * @return Response
     */
    public function changePassword(Request $request, UserPanelService $userPanelService): Response
    {
        $user = $this->getUser();
        $userPanelService->savePassword($user,$request);

        return $this->render('User/show.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/user/changename", name="user_change_name", options={"expose"=true})
     * @param Request $request
     * @param UserPanelService $userPanelService
     * @return Response
     */
    public function changeName(Request $request, UserPanelService $userPanelService): Response
    {
        $user = $this->getUser();
        $userPanelService->saveName($user,$request);

        return $this->render('User/show.html.twig', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/user/changeemail", name="user_change_email", options={"expose"=true})
     * @param Request $request
     * @param UserPanelService $userPanelService
     * @return Response
     */
    public function changeEmail(Request $request, UserPanelService $userPanelService): Response
    {
        $user = $this->getUser();
        $userPanelService->saveEmail($user,$request);

        return $this->render('User/show.html.twig');
    }
}