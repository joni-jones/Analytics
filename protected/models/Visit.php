<?php

/**
 * This is the model class for table "visit".
 *
 * The followings are the available columns in table 'visit':
 * @property string $id
 * @property string $station_id
 * @property string $device_id
 * @property string $time
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property Device $device
 * @property Station $station
 */
class Visit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('level', 'numerical', 'integerOnly'=>true),
			array('station_id, device_id, time', 'length', 'max'=>11),
			array('time, level', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'device' => array(self::BELONGS_TO, 'Device', 'device_id'),
			'station' => array(self::BELONGS_TO, 'Station', 'station_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'station_id' => 'Station',
			'device_id' => 'Device',
			'time' => 'Time',
			'level' => 'Level',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('time',$this->time,true);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
