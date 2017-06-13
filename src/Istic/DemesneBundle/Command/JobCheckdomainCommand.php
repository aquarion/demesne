<?php

namespace Istic\DemesneBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Istic\DemesneBundle\Service\WhoAPI;

class JobCheckdomainCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('job:checkdomain')
            ->setDescription('Check a domain for expiry')
            ->addArgument('domain', InputArgument::REQUIRED, 'Domain to check')
            // ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $domain = $input->getArgument('domain');
        $whoAPI = $this->getContainer()->get('whois_api');
        
        $res = $whoAPI->checkDomain($domain); 
        var_dump($res);

        $output->writeln('Command result.');
    }

}
