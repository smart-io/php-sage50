<?php
namespace Sinergi\Sage50;

class Config
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $dbname;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

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
}
