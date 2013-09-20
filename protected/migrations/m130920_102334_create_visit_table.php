<?php

class m130920_102334_create_visit_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('visit', array(
            'id' => 'INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'station_id' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0',
            'device_id' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0',
            'time' => 'INTEGER(11) UNSIGNED NOT NULL DEFAULT 0',
            'level' => 'TINYINT(4) UNSIGNED NOT NULL DEFAULT 0'
        ));
        $this->addForeignKey('fk_visit_station', 'visit', 'station_id', 'station', 'id', 'NO ACTION', 'CASCADE');
        $this->addForeignKey('fk_visit_device', 'visit', 'device_id', 'device', 'id', 'NO ACTION', 'CASCADE');
	}

	public function safeDown()
	{
        $this->dropForeignKey('fk_visit_station', 'visit');
        $this->dropForeignKey('fk_visit_device', 'visit');
        $this->dropTable('visit');
	}
}