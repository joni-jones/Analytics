<?php

class m130919_100315_create_user_table extends CDbMigration
{

    public function safeUp()
    {
        $this->createTable('user', array(
            'id' => 'INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'password' => 'VARCHAR(60) NOT NULL DEFAULT ""',
            'email' => 'CHAR(50) NOT NULL DEFAULT ""',
            'first_name' => 'CHAR(25) NOT NULL DEFAULT ""',
            'last_name' => 'CHAR(25) NOT NULL DEFAULT ""',
            'last_login' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT "0"',
            'role' => 'ENUM("admin", "employee", "client") NULL DEFAULT "client"',
        ));
        $this->createIndex('email', 'user', 'email', true);
    }

    public function safeDown()
    {
        $this->dropIndex('email', 'user');
        $this->dropTable('user');
    }
}