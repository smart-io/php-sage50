<?php

namespace Smart\Sage50\Doctrine;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateEntitiesCommand extends Command
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('generate-entities')->setDescription('Generate entities from a database');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Doctrine\DBAL\Driver\PDOConnection $conn */
        $conn = $this->doctrine->getEntityManager()->getConnection()->getWrappedConnection();
        $query = "SHOW TABLES";
        foreach ($conn->query($query) as $row) {
            $command = new GenerateEntityCommand($this->doctrine);
            $command->setTable($row[0]);
            $command->run(new ArrayInput([]), new ConsoleOutput());
        }
    }
}
