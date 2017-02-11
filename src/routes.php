<?php
# Маршрутизация запросов

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->view->render($response, 'index.html', [
      'name' => 'Vladimir V Shalaev'
    ]);
});
