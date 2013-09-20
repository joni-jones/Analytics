<?php

class m130920_075812_create_role_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('role', array(
            'id' => 'TINYINT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'CHAR(25) NOT NULL DEFAULT ""'
        ));
        $this->insert('role', array(
            'name' => 'admin'
        ));
        $this->insert('role', array(
            'name' => 'client'
        ));
        $this->insert('role', array(
            'name' => 'employee'
        ));
	}

	public function safeDown()
	{
        $this->dropTable('role');
	}
}