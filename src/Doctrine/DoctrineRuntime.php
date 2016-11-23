<?php

namespace Smart\Sage50\Doctrine;

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Smart\Sage50\Config;
use Symfony\Component\Console\Helper\HelperSet;

class DoctrineRuntime
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    public function __construct(Config $config)
    {
        $this->doctrine = new Doctrine();
	    $this->doctrine->setConfig($config);
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
