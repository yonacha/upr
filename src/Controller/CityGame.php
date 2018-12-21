<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 12/21/2018
 * Time: 2:31
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/city_game")
 *
 * Class CityGame
 * @package App\Controller
 */
class CityGame extends AbstractController
{
    /**
     * @Route("/show", name="citygameshow")
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        return $this->render('CityGame/show.html.twig');
    }
}