<div class="col-md-8">
    <h4><?=Yii::t('app', 'Shopper Retention');?></h4>
    <p><?=Yii::t('app', 'How quickly do shoppers return to your stores?
                Do you need to reengage lapsed shoppers to increase their visit frequensy?');?></p>
</div>
<div class="col-md-12">
    <div class="col-md-2 report-form-container">
        <?=CHtml::beginForm('', 'post', array('role' => 'form', 'class' => 'report-form'));?>
            <div class="form-group">
                <label><?=Yii::t('app', 'Store');?>:</label>
                <?=CHtml::dropDownList('store', '', array(), array('class' => 'form-control'));?>
            </div>
            <div class="form-group">
                <label><?=Yii::t('app', 'Date');?>:</label>
                <?=CHtml::dropDownList('date_range', '0', PHelper::getWeekRange(), array('class' => 'form-control'));?>
            </div>
            <div class="form-group">
                <label><?=Yii::t('app', 'Customer Type');?>:</label>
                <div class="btn-group">
                    <?php $counter = 0;?>
                    <?php foreach(Customer::getTypes() as $key => $type):?>
                        <?php
                            $class = ($counter == 0) ? 'btn btn-primary' : 'btn';
                            $counter++;
                        ?>
                        <?=CHtml::button($type, array('class' => $class, 'name' => 'customer_type', 'data-type' => $key));?>
                    <?php endforeach;?>
                </div>
            </div>
        <?=CHtml::endForm();?>
    </div>
    <div id="shopper-retention-chart" class="chart-container col-md-6"></div>
</div>