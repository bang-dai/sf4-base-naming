<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateMyArticleCommand extends Command
{
    // the name of the command (the part after "bin/console") no snake_case, no camelCase, no PascalCase
    protected static $defaultName = 'app:create-my-article';

    protected function configure()
    {
        $this
            ->setDescription('Creates a new myArticle .')
            ->setHelp('This command allows to ...')
            ->addArgument('title', InputArgument::OPTIONAL, 'to force the article title')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}