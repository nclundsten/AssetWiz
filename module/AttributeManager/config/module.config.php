<?php return array(
    'router' => array('routes' => array(
        'attribute-manager' => array(
            'type' => 'literal',
            'options' => array(
                'route' => '/attributes',
                'defaults' => array(
                    'controller' => 'AttributeManager\Controller\IndexController',
                    'action' => 'index',
                ),
            ),
        ),
    )),
    'controllers' => array('invokables' => array(
        'AttributeManager\Controller\IndexController' => 'AttributeManager\Controller\IndexController',
    )),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
