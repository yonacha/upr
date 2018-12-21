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

/**
 * @Route("/news")
 *
 * Class NewsController
 * @package App\Controller
 */
class NewsController extends AbstractController
{
    /**
     * @Route("/list", name="newslist")
     * @param Request $request
     * @return Response
     */
    public function list(Request $request): Response
    {
        return $this->render('News/list.html.twig');
    }
}
