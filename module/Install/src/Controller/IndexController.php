<?php

namespace Install\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $installService;

    public function indexAction()
    {
        $this->getInstallService();
        die('foo');
        $this->init();

        var_dump($this->getStepResults()); die();

        die('install complete');
    }

    protected function getStepResults()
    {
        $steps = array(
            'tests'      => false,
            'db-adapter' => false,
            'schema'     => false,
        );

        if ($this->configWritable()) {
            $steps['config-writable'] = true;
        } else {
            return $steps;
        }

        if ($this->hasDbAdapter()) {
            $steps['db-adapter'] = true;
        } else {
            return $steps;
        }

        if ($this->schemaBuilt()) {
            $steps['schema'] = true;
        } else {
            return $steps;
        }

        return $steps;
    }

    public function introAction()
    {
        $this->init();

        //test that the install will work smoothly
        if ( ! is_writable(dirname(APPLICATION_PATH . '/config/autoload'))) {
            echo dirname($newFileName) . ' must writable!!!';
        } else {
            $_SESSION['install']['autoload_writable'] = true;
            return $this->redirect()->toRoute('install');
        }
    }

    public function dbAdapterAction()
    {
        $this->init();

        if ($this->hasDbAdapter()) {
            return $this->redirect()->toRoute('install');
        }

        die('install db adapter');
    }

    protected function schemaBuilt()
    {
        return false;
    }

    protected function hasDbAdapter()
    {
        if (!file_exists(APPLICATION_PATH . '/config/autoload/database.local.php')) {
            return false;
        }
        return true;
    }

    protected function configWritable()
    {
        if (true !== $_SESSION['install']['autoload_writable']) {
            return false;
        }
        return true;
    }

    public function getInstallService()
    {
        if (null === $this->installService) {
            $this->installService = $this->getServiceLocator()
                ->get('Install\Service\InstallService');
        }
        return $this->installService;
    }

    public function setInstallService($installService)
    {
        $this->installService = $installService;
    }
}
