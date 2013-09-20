<?php

/**
 * This is the model class for table "role".
 *
 * The followings are the available columns in table 'role':
 * @property integer $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class Role extends CActiveRecord
{
    const ADMIN = 'admin';
    const EMPLOYEE = 'employee';
    const CLIENT = 'client';

    protected $_table = 'role';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return $this->_table;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>25),
			array('name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'users' => array(self::HAS_MANY, 'User', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Role the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Get roles list
     * @TODO need refactoring this method
     *
     * @access public
     * @static
     * @return array
     */
    public static function getRoles()
    {
        return array(
            1 => Yii::t('app', 'Administrator'),
            2 => Yii::t('app', 'Client'),
            3 => Yii::t('app', 'Employee'),
        );
    }

    public static function getRole($role_id)
    {
        return Yii::app()->db->createCommand()
            ->select('name')
            ->from(self::model()->tableName())
            ->where('id = :id', array(':id' => $role_id))
            ->queryScalar()
            ;
    }
}
