<div class="navbar-collapse collapse">
    <div class="navbar-form navbar-right">
        <a href="<?=Yii::app()->createUrl('site/logout');?>">
            <span class="glyphicon glyphicon-off"></span>
            <?=Yii::t('app', 'Logout');?>
        </a>
    </div>
    <?php $this->widget('zii.widgets.CMenu',array(
        'encodeLabel' => false,
        'items'=>array(
            array('label'=> Yii::t('app', 'Reports'), 'url'=>array('site/reports')),
            array('label'=> Yii::t('app', 'Clients'), 'url'=>array('site/clients')),
        ),
        'htmlOptions' => array('class' => 'nav navbar-nav')
    ));?>
</div>