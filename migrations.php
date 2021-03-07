<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 04-Mar-21
 * Time: 21:15
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/main.php';

use emcodepro\mvc\Application;

$app = new Application(__DIR__, $config);


$down = ($argv[1] === '--down') ? true : false;
$app->db->applyMigrations($down);
