<?php
$title = "";

$author = "";

$description = "";

$keyword = "";
?>
<meta name="keyword" content="<?= $keyword ?>">
<meta name="description" content="<?= $description ?>">
<meta name="author" content="<?= $author ?>">
<meta property="og:image" content="<?php echo yii::app()->theme->baseUrl; ?>/assets/img/logo_disperindag.png" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="icon" sizes="16x16" href="<?php echo yii::app()->theme->baseUrl ?>/assets/img/favicon.png" />
<?php Yii::app()->clientScript->registerPackage('front-css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugin/font-icons/entypo/css/entypo.css');?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugin/font-icons/font-awesome/css/font-awesome.min.css');?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/font.css');?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/style.css');?>
