<?php
/**
 * @package Analytics
 * @date 22.09.13 21:27
 */ 
class Customer extends User{
    const TYPE_ALL = 0;
    const TYPE_NEW = 1;
    const TYPE_REPEAT = 2;

    public static function getTypes()
    {
        return array(
            self::TYPE_ALL => Yii::t('app', 'All'),
            self::TYPE_NEW => Yii::t('app', 'New'),
            self::TYPE_REPEAT => Yii::t('app', 'Repeat'),
        );
    }
}
