<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\Api' => 'Api\Controller\ApiController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'api' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/api',
                    'constraints' => array(
                        
                    ),
                    'defaults' => array(
                        'controller' => 'Api\Controller\Api',
                        'action'     => 'index',
                    ),
                ),
                'options' => array(
                    
                    
                    
                    'route'    => '/api[/][:action][/:url]',
                    'constraints' => array(
                        //'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        //'url'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    
                    'defaults' => array(
                        'controller' => 'Api\Controller\Api',
                        'action'     => 'make-short-url',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'api' => __DIR__ . '/../view',
        ),
    ),
    
    
    array(
        'service_manager' => array(
            'invokables' => array(
                'Api\Model\Url' => 'Api\Model\Url',
            ),
        ),
    )
);