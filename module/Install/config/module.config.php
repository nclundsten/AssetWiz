<?php return array(
    'router' => array('routes' => array(
        'install' => array(
            'type' => 'literal',
            'options' => array(
                'route' => '/install',
                'defaults' => array(
                    'controller' => 'Install\Controller\IndexController',
                    'action' => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'db-adapter' => array(
                    'type' => 'literal',
                    'options' => array(
                        'route' => '/db-adapter',
                        'defaults' => array(
                            'controller' => 'Install\Controller\IndexController',
                            'action' => 'dbAdapter',
                        ),
                    ),
                ),
                'intro' => array(
                    'type' => 'literal',
                    'options' => array(
                        'route' => '/intro',
                        'defaults' => array(
                            'controller' => 'Install\Controller\IndexController',
                            'action' => 'intro',
                        ),
                    ),
                ),
                'schemas' => array(
                    'type' => 'literal',
                    'options' => array(
                        'route' => '/schemas',
                        'defaults' => array(
                            'controller' => 'Install\Controller\IndexController',
                            'action' => 'schemas',
                        ),
                    ),
                ),
            ),
        ),
    )),
    'controllers' => array('invokables' => array(
        'Install\Controller\IndexController' => 'Install\Controller\IndexController',
    )),
    'service_manager' => array('factories' => array(
        'Install\Service\InstallService' => 'Install\Service\InstallService',
    )),
);
