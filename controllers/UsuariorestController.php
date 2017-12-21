<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\base\ErrorException;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuariorestController extends ActiveController
{
    public $modelClass ='app\models\Usuario';
    
        
    //Mejora un para de funciones que indiquen si se cambio la contraseña // o si se dió de baja
    public function actionUpdatetipouno(){
        // implement here your code
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON; 
        
        $modelpost = new Usuario();        
        $modelpost->attributes = \yii::$app->request->post();          
        $model = new Usuario();  
        $model=$model->findIdentity($modelpost->intIdUsuario);
        //return $model;       
        $model->dtiFechaUltMod = $modelpost->dtiFechaUltMod;        
        if( $modelpost->bitActivo == true)
        {
            // primera verificacion se asume que los dos son hash
            if($model->vchClave != $modelpost->vchClave){                      
                // segunda verificacion , transforma el texto a hash y vuelve a comparar
                $newclave= $modelpost->vchClave;
                $modelpost->setPassword($modelpost->vchClave);
                if($model->vchClave != $modelpost->vchClave ){ 
                    $model->vchClave = $modelpost->vchClave;
                    $model->bitActivo = $modelpost->bitActivo;
                    $model->save();   
                    
            Yii::$app->mailer->view->params['subtitulocorreo'] = 'Actualizacion';
            Yii::$app->mailer->view->params['nombreusercorreo'] = $model->vchCorreo;
            Yii::$app->mailer->view->params['restaurapassw'] = $newclave;
            Yii::$app->mailer->compose(                    
                    ['html' => 'layouts/html']                    
                    )
                    ->setTo($model->vchCorreo)
                    ->setFrom(Yii::$app->params['adminEmail'])
                    ->setSubject('Actualizacion de clave')                     
                    ->send();  
            
                }                
            }                                    
        }else
        {
            $model->bitActivo = $modelpost->bitActivo;
            $model->dtiFechaBaja = $modelpost->dtiFechaBaja;
            $model->intCodigoEstado = $modelpost->intCodigoEstado;
            $model->save();                  
        }  
        return $model;

    }
    
    public function actionFindusuarioxiduser(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;                        
        $id= \yii::$app->request->post();                
        $model = new Usuario();
        $model = Usuario::findIdentity($id); 
        return array('status' => true, 'data'=> $model);          
    }
    
}
