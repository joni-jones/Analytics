<?php
/**
 * @package Analytics
 * @date 20.09.13 15:51
 */ 
class AjaxController extends Controller{

    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('reports', 'ShopperRetentionView'),
                'users' => array('@')
            ),
            array('deny',
                'users' => array('')
            )
        );
    }

    public function actionReports()
    {
        $this->_responseJSON(Report::model()->getAll());
    }

    public function actionShopperRetentionView()
    {
        $this->layout = '';
        $view = $this->renderPartial('/reports/shopperRetention', array(), true);
        $this->_responseHtml($view);
    }
}
