<?php

class m130920_120007_create_report_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('report', array(
            'id' => 'TINYINT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'CHAR(45) NOT NULL DEFAULT "0"'
        ));
        $this->insert('report', array(
            'name' => 'Shopper Retention',
        ));
        $this->insert('report', array(
            'name' => 'Cross Shopping',
        ));
        $this->insert('report', array(
            'name' => 'Outside Traffic Report',
        ));
        $this->insert('report', array(
            'name' => 'Window Display',
        ));
	}

	public function safeDown()
	{
        $this->dropTable('report');
	}
}