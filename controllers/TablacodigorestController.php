<?php

namespace app\controllers;
use Yii;
use yii\base\Model;
use app\models\Tablacodigo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;


class TablacodigorestController extends ActiveController
{
    public $modelClass ='app\models\Tablacodigo';
     
    public function actionFindtablacodigoxcodigo(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;                        
        $codigo= \yii::$app->request->post();                
        $model = new Tablacodigo();       
        $model = $model->findxCodigo($codigo); 
        return array('status' => true, 'data'=> $model);          
    }
}
