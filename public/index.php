<?php
require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, ['cache' => false]);

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
  case '/':
    echo $twig->render('landing.html.twig');
    break;

  case '/sign-up':
    echo $twig->render('sign-up.html.twig');
    break;

  case '/sign-in':
    echo $twig->render('sign-in.html.twig');
    break;

  case '/dashboard':
    echo $twig->render('dashboard.html.twig');
    break;
  case '/dashboard/tickets':
    echo $twig->render('tickets.html.twig');
    break;

  default:
    http_response_code(404);
    echo $twig->render('not-found.html.twig');
    break;
}
