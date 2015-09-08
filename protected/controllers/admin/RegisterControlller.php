<?php

/**
 * Created by PhpStorm.
 * User: hanse
 * Date: 9/9/2015
 * Time: 1:00 AM
 */
class RegisterControlller extends AdminController
{
    public function actionIndex(){
        $model = new User;
        $pesan = "";
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->username = $_POST['User']['username'];
            $model->password = crypt($_POST['User']['password']);
            $model->namalengkap = $_POST['User']['namalengkap'];
            $token = Yii::app()->request->getCsrfToken();
            $salt = md5(($_POST['User']['username']));
            $model->token = $token;
            $model->salt = $salt;
            $model->is_register = 1;
            $model->is_aktif = 1;

            //var_dump($model);exit;

            if ($model->save()) {
                //$this->redirect('/admin/users');
                $pesan = "Sukses";
            }else{
                $pesan = "Gagal";
            }
            echo $pesan;
        }

        $this->render('create', array(
            'model' => $model,
            'pesan' => $pesan,
        ));
    }
}