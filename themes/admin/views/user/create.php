<ol class="breadcrumb bc-3">
    <li>
        <a href="/admin">Beranda</a>
    </li>

    <li class="active">
        <strong>Tambah Pengguna</strong>
    </li>
</ol>

<h2>Tambah Pengguna</h2>
<br />
    <?php if(Yii::app()->user->hasFlash('pesan')): ?>
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?= !empty($pesan) ? $pesan : ""?> !</strong> <?php echo Yii::app()->user->getFlash('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
                </div>
            </div>
        </div>
    </div>

<?php
Yii::app()->clientScript->registerScript ('test','
    $(document).ready(function(){
        $(".nav-user").addClass("opened");
        $(".nav-user ul li:nth-child(2)").addClass("active");
    });
',CClientScript::POS_END)
?>