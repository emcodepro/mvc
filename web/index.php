<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 04-Mar-21
 * Time: 21:15
 */

require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../config/main.php';

use app\controllers\ProfileController;
use app\controllers\SiteController;
use emcodepro\mvc\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ],
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'index']);

$app->router->get('/about', [SiteController::class, 'about']);

$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/settings', [ProfileController::class, 'settings']);
$app->router->get('/logout', [SiteController::class, 'logout']);

$app->run();
