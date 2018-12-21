<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 12/21/2018
 * Time: 2:21
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interactive_map")
 *
 * Class InteractiveMapController
 * @package App\Controller
 */
class InteractiveMapController extends AbstractController
{
    /**
     * @Route("/show", name="interactivemapshow")
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        return $this->render('InteractiveMap/show.html.twig');
    }
}