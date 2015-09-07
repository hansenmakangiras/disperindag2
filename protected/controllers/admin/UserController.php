<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends Controller
{

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    function actions(){
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'modelClass' => 'User',
            ),
        );
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

//    public function accessRules()
//    {
//        return array(
//            array('allow',  // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index','view'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create','update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin','delete'),
//                'users' => array('admin'),
//            ),
//            array('deny',  // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }

    public function actionIndex()
    {
        $models = array();

        if(!empty($_POST['User'])){
            foreach ($_POST['User'] as $postData) {
                $model = new User;
                $model->setAttributes($postData);
                if($model->validate())
                    $models[] = $model;
            }

        }
        if(!empty($models)){

        }else{
            $models[] = new User();
        }

        $this->render("index", array(
            'models'=>$models,
        ));
    }

    /**
     * Displays a particular model.
     *
     * @param int $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new User;
        $pesan = "";
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            $model->username = $_POST['User']['username'];
            $model->password = $_POST['User']['password'];
            $model->namalengkap = $_POST['User']['namalengkap'];
            $token = Yii::app()->request->getCsrfToken();
            $salt = md5(($_POST['User']['username']));
            $model->token = $token;
            $model->salt = $salt;
            $model->is_register = 1;
            $model->is_aktif = 1;

            if ($model->save()) {
                $this->redirect('/admin/users');
//                    $pesan = "Sukses";
//                    $mail = new YiiMailer();
//                    $mail->SetFrom('info@disperindag.com', 'Disperindag');
//                    $mail->Subject = "Registrasi Akun";
//                    $msg = $this->renderPartial('//mailtemplate/registrasi', array(
//                        'name'=>$_POST['User']['username'],
//                        'token'=>$token,
//                    ), true, true);
//                    $mail->MsgHTML($msg);
//                    $mail->AddAddress($model->email);
//
//                    if ($mail->send()) {
//                        $pesan = "Permintaan pendaftaran anda telah kami terima. Silahkan cek email anda untuk melanjutkan proses pendaftaran.";
//                        $model->unsetAttributes();
//                        $this->redirect('/admin/users');
//                    }else{
//                        echo $mail->ErrorInfo;
//                    }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'pesan' => $pesan,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     *
     * @param int $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User'])) {
            $model->attributes = $_GET['User'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     *
     * @param int $id the ID of the model to be loaded
     *
     * @return User the loaded model
     *
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     *
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form-login') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}
