<?php

class m130920_100751_create_station_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('station', array(
            'id' => 'INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'store_id' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0'
        ));
        $this->addForeignKey('fk_station_store', 'station', 'store_id', 'store', 'id', 'NO ACTION', 'CASCADE');
	}

	public function safeDown()
	{
        $this->dropForeignKey('fk_station_store', 'station');
        $this->dropTable('station');
	}
}