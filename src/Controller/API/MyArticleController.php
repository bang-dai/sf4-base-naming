<?php

namespace App\Controller\API;

use App\Service\MyArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Rest\Route("/api/articles")
 */
class MyArticleController extends AbstractController
{
    private $myArticleService;

    public function __construct(MyArticleService $myArticleService)
    {
        $this->myArticleService = $myArticleService;
    }

    /**
     * @Rest\Get("", name="api_my_article")
     * @Rest\View(StatusCode = 200)
     */
    public function getMyArticles()
    {
        $myArticles = $this->myArticleService->getArticles();

        return $this->json($myArticles);
    }
}