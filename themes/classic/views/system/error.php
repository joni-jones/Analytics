<?php
$this->pageTitle = Yii::app()->name.' | '.$code;
?>
<div class="row error-page">
    <div class="modal show">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="error-code"><?=$code;?></div>
                            <div class="error-message"><?=CHtml::encode($message);?></div>
                        </div>
                        <div class="col-md-6">
                            <p><?=Yii::t('sys', 'Please, try again later');?>.</p>
                            <p>
                                <?=Yii::t('app', 'Or contact with our administrator');?><br/>
                                <a href="mailto:<?=Yii::app()->params['adminEmail'];?>">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    <?=Yii::t('app', 'Contact');?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>