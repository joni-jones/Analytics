<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $last_login
 * @property string $role
 */
class User extends CActiveRecord
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_EMPLOYEE = 'employee';
    const ROLE_CLIENT = 'client';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password', 'length', 'max'=>60),
			array('email', 'length', 'max'=>50),
            array('email', 'required'),
            array('email', 'unique'),
			array('first_name, last_name', 'length', 'max'=>25),
			array('last_login', 'length', 'max'=>11),
			array('role', 'length', 'max'=>8),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'password' => 'Password',
			'email' => 'Email',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'last_login' => 'Last Login',
			'role' => 'Role',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Update last login time
     *
     * @access public
     */
    public function updateLastLoginTime()
    {
        $this->last_login = time();
        self::model()->updateByPk($this->id, array('last_login' => $this->last_login));
    }

    /**
     * Validate password
     *
     * @access public
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    /**
     * Hash password
     *
     * @access public
     * @static
     * @param $password
     * @return string
     */
    public static function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

    /**
     * Get roles list
     *
     * @access public
     * @static
     * @return array
     */
    public static function getRoles()
    {
        return array(
            self::ROLE_ADMIN => Yii::t('app', 'Administrator'),
            self::ROLE_USER => Yii::t('app', 'User'),
            self::ROLE_CLIENT => Yii::t('app', 'Client'),
            self::ROLE_EMPLOYEE => Yii::t('app', 'Employee'),
        );
    }
}
