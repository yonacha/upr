<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 12/19/2018
 * Time: 20:58
 */

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\News;
use App\Form\CommentType;
use App\Form\NewsType;
use App\Service\FileUploadService;
use App\Service\NewsService;
use App\Service\PageTools\PageTool;
use App\Service\PageTools\PageToolContainer;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\PersistentCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

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
     * @param NewsService $service
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function list(Request $request, NewsService $service, PageToolContainer $toolContainer, TranslatorInterface $translator): Response
    {
        $toolContainer->addTool(new PageTool('news_add', $translator->trans('news.add')));

        return $this->render('News/list.html.twig', [
            'news' => $service->getAllNews(),
            'tools' => $toolContainer->getTools(),
        ]);
    }

    /**
     * @Route("/add", name="news_add")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param TranslatorInterface $translator
     * @param FileUploadService $uploadService
     * @return Response
     */
    public function add(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translator, FileUploadService $uploadService, PageToolContainer $toolContainer): Response
    {
        $toolContainer->addTool(new PageTool('newslist', $translator->trans('news.list')));
        if (!$user = $this->getUser()) {
            throw new NotFoundHttpException('User not found in database');
        }
        $form = $this->createForm(NewsType::class, new News());
        $form->handleRequest($request);

        if($form->isSubmitted() &&  $form->isValid() && !$this->captchaverify($request->get('g-recaptcha-response'))){

            $this->addFlash(
                'error',
                'Captcha Require'
            );
        }

        if ($form->isSubmitted() && $form->isValid() && $this->captchaverify($request->get('g-recaptcha-response'))) {
            $news = $form->getData();
            $news->setInputUser($user);

            /** @var UploadedFile $image */
            $image = $news->getImage();
            try {
                $imageName = $uploadService->upload($image, $this->getParameter('news_image_dir')) ;
            } catch (FileException $e) {
                $this->addFlash('danger', $translator->trans('news.image_upload_problem'));

                return $this->redirectToRoute('newslist');
            }
            $news->setImage($imageName);

            $entityManager->persist($news);
            $entityManager->flush();
            $this->addFlash('success', $translator->trans('news.added'));

            return $this->redirectToRoute('newslist');
        }

            return $this->render('News/add.html.twig', [
            'form' => $form->createView(),
            'tools' => $toolContainer->getTools(),
        ]);

    }

    function captchaverify($recaptcha){
        if (isset($recaptcha)){return true;};
    }
    /*
    function captchaverify($recaptcha){
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "secret"=>"6LcyAJIUAAAAACl9vCggBLdtRtlmBJa9efghL9Ea","response"=>$recaptcha));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);

        return $data->success;
    }
    */
    /**
     * @Route("/edit/{id}", name="news_edit", options={"expose"=true}, requirements={"id"="\d+"})
     * @param News $news
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param TranslatorInterface $translator
     * @param FileUploadService $uploadService
     * @param PageToolContainer $toolContainer
     * @return Response
     */
    public function edit(News $news, Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translator, FileUploadService $uploadService, PageToolContainer $toolContainer): Response
    {
        $toolContainer->addTool(new PageTool('newslist', $translator->trans('news.list')));
        if (!$user = $this->getUser()) {
            throw new NotFoundHttpException('User not found in database');
        }
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $news = $form->getData();
            $news->setInputUser($user);

            /** @var UploadedFile $image */
            $image = $news->getImage();
            try {
                $imageName = $uploadService->upload($image, $this->getParameter('news_image_dir')) ;
            } catch (FileException $e) {
                $this->addFlash('danger', $translator->trans('news.image_upload_problem'));

                return $this->redirectToRoute('newslist');
            }
            $news->setImage($imageName);

            $entityManager->persist($news);
            $entityManager->flush();
            $this->addFlash('success', $translator->trans('news.added'));

            return $this->redirectToRoute('newslist');
        }

        return $this->render('News/add.html.twig', [
            'form' => $form->createView(),
            'tools' => $toolContainer->getTools(),
        ]);
    }

    /**
     * @Route("/details/{id}", name="news_details", requirements={"id"="\d+"})
     * @param Request $request
     * @param News $news
     * @param PageToolContainer $toolContainer
     * @param TranslatorInterface $translator
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function details(Request $request, News $news, PageToolContainer $toolContainer, TranslatorInterface $translator, EntityManagerInterface $entityManager): Response
    {
        $toolContainer->addTool(new PageTool('newslist', $translator->trans('news.back_to_list')));

        $form = $this->createForm(CommentType::class, new Comment());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Comment $comment */
            $comment = $form->getData();
            $comment->setNews($news);
            $comment->setInputUser($this->getUser());
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', $translator->trans('comments.added'));
            return $this->redirectToRoute('news_details', ['id' => $news->getId()]);
        }

        /** @var PersistentCollection $comments */
        $comments = $news->getComments();
        return $this->render('News/details.html.twig', [
            'news' => $news,
            'tools' => $toolContainer->getTools(),
            'form' => $form->createView(),
            'comments' => $comments->isEmpty() ? null : $comments,
        ]);
    }
}
