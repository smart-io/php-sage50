<?php
namespace Sinergi\Sage50;

use Doctrine\ORM\EntityManagerInterface;
use Sinergi\Config\Config as SinergiConfig;
use Sinergi\Sage50\Doctrine\Doctrine;

class Sage50 extends Container
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param array|Config $config
     */
    public function __construct($config)
    {
        if (is_array($config)) {
            $this->config = new Config($config);
        } elseif ($config instanceof Config) {
            $this->config = $config;
        } else {
            throw new \InvalidArgumentException;
        }
        (new Annotation())->setup();
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        if (null === $this->entityManager) {
            $doctrine = new Doctrine();
            $config = new SinergiConfig(__DIR__ . '/../../config');
            $config->set('doctrine.connection.host', $this->getConfig()->getHost());
            $config->set('doctrine.connection.dbname', $this->getConfig()->getDbname());
            $config->set('doctrine.connection.user', $this->getConfig()->getUser());
            $config->set('doctrine.connection.password', $this->getConfig()->getPassword());
            $doctrine->setConfig($config);
            $this->entityManager = $doctrine->getEntityManager();
        }
        return $this->entityManager;
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @return $this
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
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
    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
    }
}
