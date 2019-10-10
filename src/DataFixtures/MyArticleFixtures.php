<?php

namespace App\DataFixtures;

use App\Entity\MyArticle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MyArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $myArticle = new MyArticle();
            $myArticle->setTitle('title '.$i);
            $myArticle->setContent('content '.$i);
            $manager->persist($myArticle);
        }

        $manager->flush();
    }
}
