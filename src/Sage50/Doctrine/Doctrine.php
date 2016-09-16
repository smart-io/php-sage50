<?php

namespace Smart\Sage50\Doctrine;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Persistence\AbstractManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Console\Command\Command as DoctrineCommand;
use Symfony\Component\Console\Helper\HelperSet;
use Exception;
use Smart\Sage50\Config;

class Doctrine extends AbstractManagerRegistry
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var HelperSet
     */
    private $helperSet;

    /**
     * @var DoctrineCommand[]
     */
    private $commands;

    /**
     * @var Config
     */
    private $config;

    public function __construct()
    {
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return $this
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getService($name)
    {
        return $this->getEntityManager($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function resetService($name)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getAliasNamespace($alias)
    {
        /** @var EntityManager $entityManager */
        foreach ([$this->entityManager] as $entityManager) {
            try {
                return $entityManager->getConfiguration()->getEntityNamespace($alias);
            } catch (ORMException $e) {
            }
        }

        throw ORMException::unknownEntityNamespace($alias);
    }

    private function addDefaultCommands()
    {
        $this->commands = [
            new GenerateEntitiesCommand($this),
            new GenerateEntityCommand($this),
        ];
    }

    /**
     * @param DoctrineCommand $command
     * @return $this
     */
    public function addCommand(DoctrineCommand $command)
    {
        if (null === $this->commands) {
            $this->addDefaultCommands();
        }
        $this->commands[] = $command;
        return $this;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        if (null === $this->commands) {
            $this->addDefaultCommands();
        }
        return $this->commands;
    }

    /**
     * @return HelperSet
     */
    public function getHelperSet()
    {
        if (null === $this->helperSet) {
            $this->helperSet = ConsoleRunner::createHelperSet($this->getEntityManager());
        }
        return $this->helperSet;
    }

    /**
     * @param EntityManager $entityManager
     * @return $this
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return EntityManager|null
     */
    public function getEntityManager()
    {
        if (isset($this->entityManager)) {
            return $this->entityManager;
        }
        return $this->entityManager = $this->createEntityManager();
    }

    /**
     * @return EntityManager|null
     * @throws Exception
     */
    public function createEntityManager()
    {
        $dbParams = [
            'driver'   => 'pdo_mysql',
            'host'     => $this->getConfig()->getHost(),
            'user'     => $this->getConfig()->getUser(),
            'password' => $this->getConfig()->getPassword(),
            'dbname'   => $this->getConfig()->getDbname(),
            'charset' => 'latin1',
        ];

        if ($this->getConfig()->getPort()) {
            $dbParams['port'] = $this->getConfig()->getPort();
        }

        $isDevMode = $this->getConfig()->isDev();
        $doctrineConfig = Setup::createConfiguration($isDevMode);

        $doctrineConfig->setMetadataDriverImpl(
            new AnnotationDriver(new AnnotationReader(), [realpath(__DIR__ . '/../')])
        );

        return EntityManager::create($dbParams, $doctrineConfig);
    }
}
