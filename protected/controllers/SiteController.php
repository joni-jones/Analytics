<?php

class SiteController extends AuthController
{

    public function accessRules()
    {
        $parentRules = parent::accessRules();
        $controllerRules = array(
            array('allow',
                'actions' => array('login', 'forgot', 'error', 'logout')
            ),
            array('allow',
                'actions' => array('index', 'reports', 'clients'),
                'roles' => array(Role::CLIENT)
            )
        );
        return CMap::mergeArray($controllerRules, $parentRules);
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $this->layout = 'auth';
        $model = new LoginForm;

        $form = Yii::app()->request->getPost('LoginForm', null);
        if($form)
        {
            $model->attributes = $form;
            if($model->validate() && $model->login())
            {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('/site/login', array(
            'model' => $model
        ));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionForgot()
    {

    }

    public function actionError()
    {
        if($error = Yii::app()->errorHandler->error)
        {
            $this->layout = 'auth';
            $this->render('/system/error', $error);
        }
    }

    public function actionReports()
    {
        $this->render('/reports/index');
    }

    public function actionClients()
    {
        $this->render('/site/clients');
    }
}