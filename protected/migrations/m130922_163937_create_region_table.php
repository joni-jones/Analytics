<?php

class m130922_163937_create_region_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('region', array(
            'id' => 'TINYINT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'CHAR(45) NOT NULL DEFAULT ""'
        ));
        $this->insert('region', array('name' => Yii::t('app', 'West')));
        $this->insert('region', array('name' => Yii::t('app', 'Center')));
        $this->insert('region', array('name' => Yii::t('app', 'North')));
        $this->insert('region', array('name' => Yii::t('app', 'South')));
        $this->insert('region', array('name' => Yii::t('app', 'East')));
	}

	public function safeDown()
	{
        $this->dropTable('region');
	}
}