<div class='modal fade' id='modal-hapus'>
    <div class='modal-dialog'>
        <div class='modal-content'>

            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                <h4 class='modal-title'>Hapus Pengguna</h4>
            </div>
            <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
                <div class='modal-body'>
                    Apakah Anda yakin menghapus pengguna ini?
                    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                </div>
            <?php endif; ?>

            <div class='modal-footer no-margin'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Kembali</button>
                <button type='button' class='btn btn-danger'>Hapus</button>
            </div>

        </div>
    </div>
</div>