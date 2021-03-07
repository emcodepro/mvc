<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 06-Mar-21
 * Time: 11:09
 */

class m0001_create_users_table
{
    public function up()
    {
        \emcodepro\mvc\Application::$app->db->pdo->exec("CREATE TABLE IF NOT EXISTS users(
                                                                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                                username VARCHAR(100) NOT NULL,
                                                                email VARCHAR(150) NOT NULL,
                                                                password VARCHAR(255) NOT NULL
                                                      ) ENGINE=INNODB");
    }

    public function down()
    {
        \emcodepro\mvc\Application::$app->db->pdo->exec("DROP TABLE users");
    }
}