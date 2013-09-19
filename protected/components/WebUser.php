<?php
/**
 * Class WebUser
 * @date 22.07.13 10:22
 */
class WebUser extends CWebUser{
    private $_model;

    /**
     * Get User model
     *
     * @access public
     * @return User
     */
    public function getUser()
    {
        if(!$this->isGuest && $this->_model === null)
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
        $role = NULL;
        if($user = $this->getUser())
        {
            $role = $user->role;
        }
        return $role;
    }
}
