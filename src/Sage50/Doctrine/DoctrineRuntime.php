<?php
namespace Sinergi\Sage50\Doctrine;

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Helper\HelperSet;
use Sinergi\Config\Config;

class DoctrineRuntime
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * @var Config
     */
    private $config;

    /**
     * @param string $configDir
     */
    public function __construct($configDir)
    {
        $this->config = new Config($configDir, 'dev');
        $this->doctrine = new Doctrine();
        $this->doctrine->setConfig($this->config);
    }

    public function run()
    {
        $entityManager = null;
        if (is_array($_SERVER['argv'])) {
            foreach ($_SERVER['argv'] as $key => $value) {
                if (substr($value, 0, 5) === '--em=') {
                    $entityManager = substr($value, 5);
                    unset($_SERVER['argv'][$key]);
                    if (is_int($_SERVER['argc'])) {
                        $_SERVER['argc']--;
                    }
                    break;
                }
            }
        }

        $commands = $this->doctrine->getCommands();
        $helperSet = $this->doctrine->getHelperSet($entityManager);

        if (!($helperSet instanceof HelperSet)) {
            foreach ($GLOBALS as $helperSetCandidate) {
                if ($helperSetCandidate instanceof HelperSet) {
                    $helperSet = $helperSetCandidate;
                    break;
                }
            }
        }

        ConsoleRunner::run($helperSet, $commands);
    }
}
