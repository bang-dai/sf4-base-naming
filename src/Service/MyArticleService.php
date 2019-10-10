<?php

namespace App\Service;

use App\Repository\MyArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

class MyArticleService
{
    private $em;
    protected $myArticleRepository; //protected vs private service

    public function __construct(EntityManagerInterface $em, MyArticleRepository $repos)
    {
        $this->em = $em;
        $this->myArticleRepository = $repos;
    }

    public function getArticles()
    {
        return $this->myArticleRepository->findAll();
    }
}