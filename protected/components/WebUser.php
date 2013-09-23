<?php
/**
 * Class WebUser
 * @date 22.07.13 10:22
 */
class WebUser extends CWebUser{
    private $_model;
    private $_role = null;

    /**
     * Get User model
     *
     * @access public
     * @return User
     */
    public function getUser()
    {
        if(!$this->isGuest)
        {
            $this->_model = User::model()->findByPk($this->id);
        }
        return $this->_model;
    }

    /**
     * Get user role
     *
     * @access public
     * @return string
     */
    public function getRole()
    {
        if(!$this->isGuest)
        {
            $this->_role = Yii::app()->user->role;
        }
        return $this->_role;
    }
}
