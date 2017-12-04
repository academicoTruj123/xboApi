<?php

namespace app\controllers;

use Yii;
use app\models\Usuarioempresa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * TablacodigoController implements the CRUD actions for Tablacodigo model.
 */
class EmpresarestController extends ActiveController
{
    public $modelClass ='app\models\Usuarioempresa';
    
    public function actionFindusuarioempresaxiduser(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;                        
        $id= \yii::$app->request->post();                
        $model = new Usuarioempresa();
        $model = Usuarioempresa::findByIdUser($id); 
        return array('status' => true, 'data'=> $model);          
    }
    
}
