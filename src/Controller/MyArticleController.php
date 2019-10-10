<?php

namespace App\Controller;

use App\Entity\MyArticle;
use App\Form\MyArticleType;
use App\Repository\MyArticleRepository;
use App\Service\MyArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class MyArticleController extends AbstractController
{
    private $myArticleService;

    public function __construct(MyArticleService $myArticleService)
    {
        $this->myArticleService = $myArticleService;
    }

    /**
     * @return Response
     * @Route("/create-and-list", name="my_article_create_and_list", methods={"GET"}, condition="'dev' === '%kernel.environment%'")
     */
    public function createAndList(Request $request): Response
    {
        $myArticle = new MyArticle();
        $form = $this->createForm(MyArticleType::class, $myArticle);
        $form->handleRequest($request);

        $myArticles = $this->myArticleService->getArticles();
        return $this->render('my_article/create_and_list.html.twig', [
            'articles' => $myArticles,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/", name="my_article_index", methods={"GET"})
     */
    public function index(MyArticleRepository $myArticleRepository): Response
    {
        return $this->render('my_article/index.html.twig', [
            'my_articles' => $myArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="my_article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $myArticle = new MyArticle();
        $form = $this->createForm(MyArticleType::class, $myArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($myArticle);
            $entityManager->flush();

            return $this->redirectToRoute('my_article_index');
        }

        return $this->render('my_article/new.html.twig', [
            'my_article' => $myArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="my_article_show", methods={"GET"})
     */
    public function show(MyArticle $myArticle): Response
    {
        return $this->render('my_article/show.html.twig', [
            'my_article' => $myArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="my_article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MyArticle $myArticle): Response
    {
        $form = $this->createForm(MyArticleType::class, $myArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('my_article_index');
        }

        return $this->render('my_article/edit.html.twig', [
            'my_article' => $myArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="my_article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MyArticle $myArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$myArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($myArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('my_article_index');
    }
}
