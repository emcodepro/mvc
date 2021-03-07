<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 06-Mar-21
 * Time: 13:18
 */

class m0002_add_status_column_to_users_table
{
    public function up()
    {
        \emcodepro\mvc\Application::$app->db->pdo->exec("ALTER TABLE users ADD COLUMN status TINYINT DEFAULT 0");
    }

    public function down()
    {
        \emcodepro\mvc\Application::$app->db->pdo->exec("ALTER TABLE users DROP COLUMN status");
    }
}