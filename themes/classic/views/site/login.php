<?php $this->setPageTitle(Yii::t('app', 'Login'));?>
<div class="row">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'method' => 'post',
        'action' => Yii::app()->createUrl('site/login'),
        'htmlOptions' => array(
            'class' => 'well form-horizontal login-form',
            'role' => 'form'
        )
    ));?>
    <div class="modal-header">
        <h4><?=Yii::t('app', 'Login');?></h4>
        <p><?=Yii::t('app', 'Please login with your email and password below');?></p>
    </div>
    <div class="modal-body">
        <?php $errors = $form->errorSummary($model);?>
        <?php if($errors):?>
            <div class="alert alert-danger"><?=$errors;?></div>
        <?php endif;?>
        <div class="form-group">
            <label class="col-md-4 control-label"><?=Yii::t('app', 'Email');?>:</label>
            <div class="col-md-8">
                <?=$form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t('app', 'Email')));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"><?=Yii::t('app', 'Password');?>:</label>
            <div class="col-md-8">
                <?=$form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => Yii::t('app', 'Password')));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"><?=Yii::t('app', 'Remember Me');?>:</label>
            <div class="col-md-8">
                <?=$form->checkBox($model, 'rememberMe');?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">&nbsp;</label>
            <div class="col-md-8">
                <?=CHtml::submitButton(Yii::t('app', 'Login'), array('name' => 'loginForm', 'class' => 'btn btn-primary'));?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?=Yii::app()->createUrl('site/forgot');?>"><?=Yii::t('app', 'Forgot your password');?>?</a>
    </div>
    <?php $this->endWidget();?>
</div>