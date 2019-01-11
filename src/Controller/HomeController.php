<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 12/19/2018
 * Time: 20:58
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/",  name="home_page")
     * @param Request $request
     * @return Response
     */
    public function home(Request $request): Response
    {
        return $this->render('base.html.twig');
    }
}
