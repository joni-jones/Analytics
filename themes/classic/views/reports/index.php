<?php
$this->pageTitle = Yii::app()->name.' | '.Yii::t('app', 'Reports');
Yii::app()->clientScript->registerScriptFile('https://www.google.com/jsapi');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getBaseUrl(true).'/js/report.js');
?>
<div class="row">
    <div class="left-block col-md-3">
        <div id="reports-menu-container" class="well sidebar-nav"></div>
    </div>
    <div class="col-md-12">
        <?=$this->renderPartial('/reports/shopperRetention');?>
    </div>
</div>
<script id="reports-menu" type="text/template">
    <ul></ul>
</script>
<script id="reports-menu-item" type="text/template">
    <a class="report-menu-item" data-id="<%=id%>"><%=name%></a>
</script>