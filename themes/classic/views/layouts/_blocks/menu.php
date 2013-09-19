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
            array('label'=> Yii::t('app', 'News'), 'url'=>array('news/index')),
            array('label'=> Yii::t('app', 'Advertisers', array(1)), 'url'=>array('site/page', 'view' => 'advertise')),
            array('label'=> Yii::t('app', 'About'), 'url'=>array('site/page', 'view' => 'about')),
            array('label'=> Yii::t('app', 'Contacts'), 'url'=>array('site/page', 'view' => 'contacts')),
        ),
        'htmlOptions' => array('class' => 'nav navbar-nav')
    ));?>
</div>