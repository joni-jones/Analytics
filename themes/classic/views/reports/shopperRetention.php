<div class="col-md-8">
    <h4><?=Yii::t('app', 'Shopper Retention');?></h4>
    <p><?=Yii::t('app', 'How quickly do shoppers return to your stores?
                Do you need to reengage lapsed shoppers to increase their visit frequensy?');?></p>
</div>
<div class="col-md-12">
    <div class="col-md-2 report-form-container">
        <?=CHtml::beginForm('', 'post', array('role' => 'form', 'class' => 'report-form'));?>
            <div class="form-group">
                <label><?=Yii::t('app', 'Location');?>:</label>
                <?=CHtml::dropDownList('location', '', array(), array('class' => 'form-control'));?>
            </div>
            <div class="form-group">
                <label><?=Yii::t('app', 'Date');?>:</label>
                <?=CHtml::textField('date', '', array('class' => 'form-control'));?>
            </div>
            <div class="form-group">
                <label><?=Yii::t('app', 'Customer Type');?>:</label>
                <div class="btn-group">
                    <?=CHtml::button('All', array('class' => 'btn btn-primary', 'name' => 'customer_type', 'data-type' => 0));?>
                    <?=CHtml::button('New', array('class' => 'btn', 'name' => 'customer_type', 'data-type' => 1));?>
                    <?=CHtml::button('Repeat', array('class' => 'btn', 'name' => 'customer_type', 'data-type' => 2));?>
                </div>
            </div>
        <?=CHtml::endForm();?>
    </div>
    <div id="shopper-retention-chart" class="chart-container col-md-6"></div>
</div>