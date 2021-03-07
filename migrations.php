<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 04-Mar-21
 * Time: 21:15
 */

require_once __DIR__ . '/vendor/autoload.php';

use emcodepro\mvc\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ],
];

$app = new Application(__DIR__, $config);


$down = ($argv[1] === '--down') ? true : false;
$app->db->applyMigrations($down);
