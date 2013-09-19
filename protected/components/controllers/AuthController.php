<?php
/**
 * Class AuthController
 * @date 23.07.13 12:51
 */
class AuthController extends CController{
    /**
     * @var WebUser
     */
    private $_user;
    /**
     * @var User
     */
    private $_userModel;

    /**
     * @override
     * @param string $id
     * @param null $module
     */
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->_initUser();
    }

    /**
     * @override
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * @override
     * @return array
     */
    public function accessRules()
    {
        return array(
            array('deny',
                'users' => array('*')
            )
        );
    }

    /**
     * Cache app auth user into class property
     *
     * @access private
     */
    private function _initUser()
    {
        $this->_user = Yii::app()->user;
    }

    /**
     * Get auth user
     *
     * @access public
     * @return WebUser
     */
    public function getAuthUser()
    {
        $this->_initUser();
        return $this->_user;
    }

    /**
     * Get auth user model
     *
     * @access public
     * @return User
     */
    public function getAuthUserModel()
    {
        if($this->_userModel === null)
        {
            $this->_userModel = $this->getAuthUser()->getUser();
        }
        return $this->_userModel;
    }
}
