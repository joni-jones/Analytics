<?php
$this->pageTitle = Yii::app()->name.' | '.$code;
?>
<div class="row error-container">
    <h2><?=$code.' '.CHtml::encode($message);?></h2>
</div>