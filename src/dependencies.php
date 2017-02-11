<?php
# Конфигурация DIC

# Получаем контейнер приложения
$container = $app->getContainer();

# Помещаем в контейнер шаблонизатор Twig
$container['view'] = function ($container) {
    $settings = $container->get('settings')['twig'];

    $view = new \Slim\Views\Twig(
      $settings['template_path'],
      $settings['options']
    );

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

# Помещаем в контейнер сервис по ведению логов Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
