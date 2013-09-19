<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?=Yii::app()->request->baseUrl;?>">
    <link rel="icon" href="<?=Yii::app()->request->baseUrl;?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/js/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/css/style.css"/>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap/js/bootstrap.min.js"></script>
    <title><?php echo CHtml::encode($this->pageTitle);?></title>
</head>
<body>
<div class="wrapper">
    <!-- content -->
    <div class="container" id="container">
        <?=$content;?>
    </div>
    <!-- end content -->
</div>
<!-- footer -->
<footer></footer>
<!-- end footer -->
</body>
</html>