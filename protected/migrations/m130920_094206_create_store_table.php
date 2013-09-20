<?php

class m130920_094206_create_store_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('store', array(
            'id' => 'INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'user_id' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0',
            'device_id' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0',
            'name' => 'CHAR(45) NOT NULL DEFAULT ""',
            'work_time' => 'CHAR(30) NOT NULL DEFAULT ""',
            'address' => 'VARCHAR(90) NOT NULL DEFAULT ""',
            'region' => 'CHAR(10) NOT NULL DEFAULT ""',
            'latitude' => 'FLOAT(10,7) NOT NULL DEFAULT "0.0000000"',
            'longitude' => 'FLOAT(10,7) NOT NULL DEFAULT "0.0000000"'
        ));
        $this->addForeignKey('fk_store_user', 'store', 'user_id', 'user', 'id', 'NO ACTION', 'CASCADE');
        $this->addForeignKey('fk_store_device', 'store', 'device_id', 'device', 'id', 'NO ACTION', 'CASCADE');
	}

	public function safeDown()
	{
        $this->dropForeignKey('fk_store_user', 'store');
        $this->dropForeignKey('fk_store_device', 'store');
        $this->dropTable('store');
	}
}