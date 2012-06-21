<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CacheCommand extends ContainerAwareCommand
{
    protected $cacheService;
    protected $userCache;
    protected $postCache;

    protected function configure()
    {
        parent::configure();

        $this
            ->setName('ology:cache')
            ->setDescription('Commands related to the caching system')
            ->addArgument('subcommand', InputArgument::REQUIRED, 'Sub-command to call : see help to see available commands related to the caching system.')
            ->setHelp('posts:ologies, posts:stashes, posts:channels --max=N --offset=M, ologists:top, ologists:reset, users:remove, users:likes')
            ->addOption('max')
            ->addOption('offset');
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method
        $this->cacheService = $this->getContainer()->get('social.service.cache');
        $this->userCache = $this->getContainer()->get('social.cache.user');
        $this->postCache = $this->getContainer()->get('social.cache.post');
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return integer 0 if everything went fine, or an error code
     *
     * @throws \LogicException When this abstract class is not implemented
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $arg = $input->getArgument('subcommand');
        $result = '';
        switch ($arg) {
            case 'posts:ologies':
                $result = $this->cacheService->cachePostsOlogies();
                $output->writeln(sprintf('Number of posts ologies cached : %s', $result));
                break;
            case 'posts:stashes':
                $result = $this->cacheService->cachePostsStashes();
                $output->writeln(sprintf('Number of posts stashes cached : %s', $result));
                break;
            case 'posts:ologies:reset':
                $output->writeln('>> Removing all posts ologies');
                $result = $this->cacheService->removeAllPostsOlogies();
                $output->writeln(sprintf('Number of posts ologies removed : %s', $result));
                $output->writeln('>> Now caching all posts ologies');
                $result = $this->cacheService->cachePostsOlogies();
                $output->writeln(sprintf('Number of posts ologies cached : %s', $result));
                break;
            case 'posts:channels':
                $max = $input->getOption('max');
                $offset = $input->getOption('offset');
                if (empty($max))
                    $max = 0;
                if (empty($offset))
                    $offset = 0;
                $result = $this->cacheService->cachePostsChannels($offset, $max);
                $output->writeln(sprintf('Number of posts channels cached : %s', $result));
                break;
            case 'ologists:top':
                $this->userCache->cacheUsers();
                $this->userCache->cacheTopOlogist();
                $this->postCache->cachePostsOfOlogyFounder();
                break;
            case 'ologists:reset':
                $this->userCache->resetTopOlogistsRedis();
                break;
            case 'users:remove':
                $result = $this->cacheService->removeAllUserCached();
                $output->writeln(sprintf('Number of removed cached users : %s', $result));
                break;
            case 'users:likes':
                $result = $this->cacheService->cacheUsersLikes();
                $output->writeln(sprintf('Total number of likes cached : %s', $result));
                break;
            default:
                $output->writeln('Unknow command. Try --help for available commands, n00b.');
        }
    }

}

