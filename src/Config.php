<?php

namespace Smart\Sage50;

class Config
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port = '13540';

    /**
     * @var string
     */
    private $dbname = 'simply';

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var bool
     */
    private $isDev = false;

    /**
     * @param array $parameters
     */
    public function __construct(array $parameters = null)
    {
        if (null !== $parameters) {
            $this->set($parameters);
        }
    }

    /**
     * @param array $parameters
     */
    public function set(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            switch ($key) {
                case 'host':
                    $this->setHost($value);
                    break;
                case 'port':
                    $this->setPort($value);
                    break;
                case 'dbname':
                    $this->setDbname($value);
                    break;
                case 'user':
                    $this->setUser($value);
                    break;
                case 'password':
                    $this->setPassword($value);
                    break;
            }
        }
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     * @return $this
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDev()
    {
        return $this->isDev;
    }

    /**
     * @param bool $isDev
     * @return $this
     */
    public function setIsDev($isDev)
    {
        $this->isDev = $isDev;
        return $this;
    }
}
