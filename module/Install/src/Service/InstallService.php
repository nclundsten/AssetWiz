<?php

namespace Install\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class InstallService implements FactoryInterface
{
    protected $serviceLocator;

    public function createService(ServiceLocatorInterface $sl)
    {
        $this->setServiceLocator($sl);
        $this->startSession();
        return $this;
    }

    protected function startSession()
    {
        session_start();
        if (!isset($_SESSION['install'])) {
            $_SESSION['install'] = array(
                'autoload_writable' => null
            );
        }
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
}
