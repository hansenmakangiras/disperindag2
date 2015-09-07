<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MediaController extends AdminController{
    public function actionIndex(){
        $this->render('index',array(

        ));
    }
    public function actionCreate(){
        $this->render('create',array(

        ));
    }
}
