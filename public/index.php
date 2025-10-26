<?php
session_start();
$currentUser = $_SESSION['ticketapp_session'] ?? null;

require_once __DIR__ . '/../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('landing.html.twig', [
    'currentUser' => $currentUser
]);
