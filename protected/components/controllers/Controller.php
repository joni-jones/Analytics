<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    const STATUS_SUCCESS = 200;
    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_FORBIDDEN = 403;
    const STATUS_NOT_FOUND = 404;
    const STATUS_APPLICATION_ERROR = 500;

	public $layout = 'main';

    protected function _responseJSON($data, $withExit = true){
        header('Content-type: application/json');
        echo CJSON::encode($data);
        if($withExit)
        {
            Yii::app()->end();
        }
    }

    protected function _responseHtml($data, $withExit = true)
    {
        header('Content-type: text/html');
        echo $data;
        if($withExit)
        {
            Yii::app()->end();
        }
    }

    protected function _error2String($errors, $delimiter = '<br/>')
    {
        $str = '';
        foreach($errors as $error)
        {
            foreach($error as $message)
            {
                $str .= $message.$delimiter;
            }
        }
        return $str;
    }
}