<?php

class m130922_172318_add_store_region_relation extends CDbMigration
{
	public function safeUp()
	{
        $this->addColumn('store', 'region_id', 'TINYINT(4) UNSIGNED NOT NULL DEFAULT 0');
        $this->addForeignKey('fk_store_region', 'store', 'region_id', 'region', 'id', 'NO ACTION', 'CASCADE');
	}

	public function safeDown()
	{
        $this->dropForeignKey('fk_store_region', 'store');
        $this->dropColumn('store', 'region_id');
	}
}