<?php
$title = "";

$author = "";

$description = "";

$keyword = "";
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Neon Admin Panel" />
<meta name="author" content="" />

<title>Neon | Dashboard</title>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!-- Library css -->
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/app.css');?>
