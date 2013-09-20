<?php

class m130920_080511_create_user_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('user', array(
            'id' => 'INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'parent_id' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0',
            'role_id' => 'TINYINT(4) UNSIGNED NOT NULL DEFAULT 0',
            'password' => 'VARCHAR(60) NOT NULL DEFAULT ""',
            'email' => 'CHAR(50) NOT NULL DEFAULT ""',
            'first_name' => 'CHAR(25) NOT NULL DEFAULT ""',
            'last_name' => 'CHAR(25) NOT NULL DEFAULT ""',
            'last_login' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT "0"'
        ));
        $this->createIndex('email', 'user', 'email', true);
        $this->addForeignKey('fk_user_role', 'user', 'role_id', 'role', 'id', 'NO ACTION', 'CASCADE');
	}

	public function safeDown()
	{
        $this->dropForeignKey('fk_user_role', 'user');
        $this->dropIndex('email', 'user');
        $this->dropTable('user');
	}
}