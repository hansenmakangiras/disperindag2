<!DOCTYPE html>
<html lang="en">
<head>
     <?php echo $this->renderPartial('/layouts/partials/meta') ;?>
</head>
<body>
    <!-- Header -->
    <header>
        <?php echo $this->renderPartial('/layouts/partials/header') ;?>
    </header>
    <!-- End Header -->
    <!-- page content -->
    <?php echo $content ;?>
    <!-- ./page content -->

    <!-- page footer -->
    <?php echo $this->renderPartial('/layouts/partials/footer') ;?>
    <!-- ./page footer -->

<!-- page scripts -->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/jquery-2.0.3.min.js',0);?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/jquery-ui.js',0);?>
<?php Yii::app()->clientScript->registerPackage('front-js'); ?>
<!-- ./page scripts -->
</body>
</html>
