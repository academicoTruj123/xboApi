<?php

namespace app\controllers;

use Yii;
use app\models\Usuariocliente;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * TablacodigoController implements the CRUD actions for Tablacodigo model.
 */
class ClienterestController extends ActiveController
{
    public $modelClass ='app\models\Usuariocliente';
    
    public function actionFindusuarioclientexiduser(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;                        
        $id= \yii::$app->request->post();                
        $model = new Usuariocliente();
        $model = Usuariocliente::findByIdUser($id); 
        return array('status' => true, 'data'=> $model);          
    }
    
}
