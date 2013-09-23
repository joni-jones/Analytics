<?php
/**
 * Class UserIdentity
 * @date 22.07.13 9:07
 */
class UserIdentity extends CUserIdentity{

    private $_id = 0;

    /**
     * Authenticate user
     *
     * @access public
     * @return bool
     */
    public function authenticate()
    {
        $username = strtolower($this->username);
        $user = User::model()->findByAttributes(array('email' => $username));
        if($user == null)
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        elseif(!$user->validatePassword($this->password))
        {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id = $user->id;
            $this->username = $user->email;
            $this->setState('username', $user->email);
            $this->setState('email', $user->email);
            $this->setState('role_id', $user->role_id);
            $this->setState('role', $user->role->name);
            $this->setState('lastLogin', ($user->last_login) ? $user->last_login : time());
            $user->updateLastLoginTime();
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    /**
     * Get id
     *
     * @access public
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
}
