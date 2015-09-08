<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $this->renderPartial('/layouts/partials/meta') ;?>
</head>
<body>
<!-- page container -->
<div class="page-container">

    <!-- page header -->
    <?php echo $this->renderPartial('/layouts/partials/header') ;?>
    <!-- ./page header -->

    <!-- page content -->
    <?php echo $content ;?>
    <!-- ./page content -->

    <!-- page footer -->
    <?php echo $this->renderPartial('/layouts/partials/footer') ;?>
    <!-- ./page footer -->
</div>
<!-- ./page container -->

<!-- Load Modal View -->
<?php $this->renderPartial('//modal/modal');?>
<?php $this->renderPartial('//modal/modal-kategori');?>
<!-- End Modal View -->

<!-- page scripts -->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/vendor.js',0);?>
<!-- ./page scripts -->
<?php
$this->widget('ext.yii-noty.ENotificationWidget', array(
    'options' => array( // you can add js options here, see noty plugin page for available options
        'dismissQueue' => true,
        'layout' => 'topCenter',
        'theme' => 'relax',
        'animation' => array(
            'open' => 'animated flipInX',
            'close' => 'animated flipOutX',
            'easing' => 'swing',
            'speed ' => 500,
        ),
        'timeout' => 6000,
    ),
    'enableIcon' => true,
    'enableFontAwesomeCss' => true,
));
?>
</body>
</html>
