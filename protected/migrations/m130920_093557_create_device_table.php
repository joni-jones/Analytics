<?php

class m130920_093557_create_device_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('device', array(
            'id' => 'INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'mac' => 'CHAR(45) NOT NULL DEFAULT ""'
        ));
        $this->createIndex('mac', 'device', 'mac', true);
	}

	public function safeDown()
	{
        $this->dropIndex('mac', 'device');
        $this->dropTable('device');
	}
}