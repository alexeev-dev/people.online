<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // TWIG settings
        'twig' => [
            'template_path' => __DIR__ . '/../resources/templates/',
            'options' => [
              'cache' => false
            ]
        ],

        // Monolog settings
        'logger' => [
            'name' => 'people.online',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
