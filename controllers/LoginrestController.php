<?php

namespace app\controllers;
use Yii;
use yii\base\Model;
use app\models\Usuario;
use app\models\UsuarioBuscar;
use app\models\UsuarioClienteReg;
use app\models\Usuariocliente;
use app\models\Usuarioempresa;
use app\models\UsuarioempresaReg;
use app\models\Tablacodigo;
use app\models\LoginForm;
use app\models\Acceso;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;


class LoginrestController extends ActiveController
{
    public $modelClass ='app\models\Usuario';
    
//    public function behaviors()
//    {
//    return [
//        'verbs' => [
//            'class' => VerbFilter::className(),
//            'actions' => [
//                'RegistrarLoginCliente' => ['post'],
//            ],
//        ],
//    ];
//    }

    public function init()
    {
        parent::init();
       // echo "llego al init de usuario"; die();                   
    }
    
//    public function actions()
//    {
//        $actions = parent::actions();       
//        return $actions;
//    }
    
    public function actionRegistrarlogincliente(){                        
         \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;  

        $modeltablacodigo = new Tablacodigo();          
        $modellogin = new UsuarioClienteReg();  
        $modellogin->attributes = \yii::$app->request->post();
        $modelUser = new Usuario(); 
        
        //Dividirlo en dos partes el registro normal del sistema // y el validacion/registro de facebook
        if($modellogin->vchTipoLogin == UsuarioClienteReg::LOGIN_CUENTA_FACEBOOK){                       
            $modelUser = $modelUser::findByUsername($modellogin->vchCorreo) ;
            if ($modelUser == null) {                    
                    // si no existe lo registra
                    //REGISTRO DE USUARIO 
                   $modelUser = new Usuario();
                   $modelUser->vchCorreo = $modellogin->vchCorreo;
                   $modelUser->vchClave='XXXXXX';
                   $modelUser->vchCodVerificacion='XXXXXX';
                   $modelUser->generateAuthKey();
                   $modelUser->intCodigoEstado = $modeltablacodigo->getIdxCodigo($modelUser::STATUS_CUENTA_ACTIVADA);
                   $modelUser->bitActivo = true;
                   $modelUser->dtiFechaReg = date('Y-m-d H:i:s');
                   $modelUser->intTipoLogin = $modeltablacodigo->getIdxCodigo(UsuarioClienteReg::LOGIN_CUENTA_FACEBOOK);
                   $modelUser->intCodigoRol = 1;                                      
                   $modelUser->save();
                                       
                   //REGISTRO DE USUARIOCLIENTE        
                   $modelUsercliente = new Usuariocliente();        
                   $modelUsercliente->intIdUsucliente=0;
                   $modelUsercliente->intIdUsuario = $modelUser->intIdUsuario;
                   $modelUsercliente->vchNombres = $modellogin->vchNombres;
                   $modelUsercliente->vchApellidoPaterno=' ';
                   $modelUsercliente->vchApellidoMaterno=' ';
                   $modelUsercliente->intCodigoSexo=0;
                   $modelUsercliente->intIdUbigeo=0;
                   $modelUsercliente->vchDomicilioUbigeo=' ';
                   $modelUsercliente->vchDomicilioDireccion=' ';
                   $modelUsercliente->vchDomicilioReferencia=' ';
                   $modelUsercliente->vchCelular=' ';
                   $modelUsercliente->vchTelefonoFijo=' ';
                   $modelUsercliente->intCodigoEstado=1 ;
                   $modelUsercliente->bitActivo=true;
                   $modelUsercliente->intIdUsuarioReg=0;
                   $modelUsercliente->dtiFechaReg=date('Y-m-d H:i:s');
                   $modelUsercliente->intIdUsuarioUltMod=0;
                   $modelUsercliente->dtiFechaUltMod=$modelUsercliente->dtiFechaReg;
                   $modelUsercliente->save();    

                   $modelacceso = new Acceso(); 
                   $modelacceso->generateToken();
                   $modelacceso->intIdUsuario =$modelUser->intIdUsuario;
                   $modelacceso->bitActivo =true;
                   $modelacceso->dtiFechaInicio = date('Y-m-d H:i:s');
                   $modelacceso->save();
                
                   Yii::$app->mailer->compose()
                           ->setTo($modellogin->vchCorreo)
                           ->setFrom('chab.28.08@gmail.com')
                           ->setSubject('Saludo de Bienvenida')
                           ->setTextBody('Bienvenido a ExpoBoda.!!!'.$modellogin->vchNombres.', esperamos que disfrute su permanencia.')
                           ->send();         
                    return array('status' => true, 'data'=> $modelUser);   
         
            }else{ 
                
                   $modelacceso = new Acceso(); 
                   $modelacceso->generateToken();
                   $modelacceso->intIdUsuario =$modelUser->intIdUsuario;
                   $modelacceso->bitActivo =true;
                   $modelacceso->dtiFechaInicio = date('Y-m-d H:i:s');
                   $modelacceso->save();                   
                  return array('status' => true, 'data'=> $modelUser);  
            }
                    
        }else{
            //Validar[que no exista un registro con ese correo]                
            if ($modelUser::findByUsername($modellogin->vchCorreo) == null) {                    

            }else{
                  return array('status' => false, 'data'=> 'Correo ya existe,debe registrarse con otro correo.');
            }
             //REGISTRO DE USUARIO        
            $modelUser->vchCorreo = $modellogin->vchCorreo;
            $modelUser->setPassword($modellogin->vchClave);
            $modelUser->generatedCodeVerificacion();
            $modelUser->generateAuthKey();
            $modelUser->intCodigoEstado = $modeltablacodigo->getIdxCodigo($modelUser::STATUS_PENDIENTE_ACTIVACION);
            $modelUser->bitActivo = 1;
            $modelUser->dtiFechaReg = date('Y-m-d H:i:s');
            $modelUser->intTipoLogin = 1;
            $modelUser->intCodigoRol = 1;
            $modelUser->save();

            //REGISTRO DE USUARIOCLIENTE        
            $modelUsercliente = new Usuariocliente();        
            $modelUsercliente->intIdUsucliente=0;
            $modelUsercliente->intIdUsuario = $modelUser->intIdUsuario;
            $modelUsercliente->vchNombres = $modellogin->vchNombres;
            $modelUsercliente->vchApellidoPaterno=' ';
            $modelUsercliente->vchApellidoMaterno=' ';
            $modelUsercliente->intCodigoSexo=0;
            $modelUsercliente->intIdUbigeo=0;
            $modelUsercliente->vchDomicilioUbigeo=' ';
            $modelUsercliente->vchDomicilioDireccion=' ';
            $modelUsercliente->vchDomicilioReferencia=' ';
            $modelUsercliente->vchCelular=' ';
            $modelUsercliente->vchTelefonoFijo=' ';
            $modelUsercliente->intCodigoEstado=1 ;
            $modelUsercliente->bitActivo=true;
            $modelUsercliente->intIdUsuarioReg=0;
            $modelUsercliente->dtiFechaReg=date('Y-m-d H:i:s');
            $modelUsercliente->intIdUsuarioUltMod=0;
            $modelUsercliente->dtiFechaUltMod=$modelUsercliente->dtiFechaReg;
            $modelUsercliente->save();                 
            Yii::$app->mailer->compose()
                    ->setTo($modellogin->vchCorreo)
                    ->setFrom('chab.28.08@gmail.com')
                    ->setSubject('Codigo de verificacion')
                    ->setTextBody('Felicitaciones.!!!'.$modellogin->vchNombres.' acaba de registrar su cuenta, solo falta la activacion, para eso escriba el siguiente codigo de verificacion : '.$modelUser->vchCodVerificacion.', para confirmar su registro.')
                    ->send();         
             return array('status' => true, 'data'=> $modelUser);                                                  
        }
        
    }
    
    public function actionRegistrarloginempresa(){
         \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;  

        $modeltablacodigo = new Tablacodigo();          
        $modellogin = new UsuarioempresaReg();  
        $modellogin->attributes = \yii::$app->request->post();
        
       // $tmp = json_encode($modellogin->attributes);
        
       // return array('status' => true, 'data'=> ' antes de $modelUser->save(); vchCorreo '.$tmp);
        
        $modelUser = new Usuario(); 
        if($modellogin->vchTipoLogin == UsuarioempresaReg::LOGIN_CUENTA_FACEBOOK){                                           
            $modelUser = $modelUser::findByUsername($modellogin->vchCorreo) ;
            if ($modelUser == null) { 
                $modelUser = new Usuario(); 
                    // si no existe lo registra
                    //REGISTRO DE USUARIO                                                                                           
                   $modelUser->vchCorreo = $modellogin->vchCorreo;                                                        
                   $modelUser->vchClave='XXXXXX';
                   $modelUser->vchCodVerificacion='XXXXXX';
                   $modelUser->generateAuthKey();                                                         
                   $modelUser->intCodigoEstado = $modeltablacodigo->getIdxCodigo($modelUser::STATUS_CUENTA_ACTIVADA);
                   $modelUser->bitActivo = true;
                   $modelUser->dtiFechaReg = date('Y-m-d H:i:s');
                   $modelUser->intTipoLogin = $modeltablacodigo->getIdxCodigo(UsuarioempresaReg::LOGIN_CUENTA_FACEBOOK);
                   $modelUser->intCodigoRol = 1;                                                           
                   $modelUser->save();
                                      
                   //REGISTRO DE USUARIOCLIENTE        
                    $modelUserempresa = new Usuarioempresa();              
                    $modelUserempresa->intIdUsuario =$modelUser->intIdUsuario;
                    $modelUserempresa->vchRazonSocial ='';
                    $modelUserempresa->vchRuc=$modellogin->vchRuc;
                    $modelUserempresa->vchContacto = '';
                    $modelUserempresa->vchContactoCorreo ='';
                    $modelUserempresa->vchNombreComercial = $modellogin->vchNombreComercial;        
                    $modelUserempresa->intIdUbigeo = 0;
                    $modelUserempresa->vchDomicilioUbigeo ='';
                    $modelUserempresa->vchDomicilioDireccion='';
                    $modelUserempresa->vchCelular='';
                    $modelUserempresa->vchTelefonoFijo='';
                    $modelUserempresa->intCodigoEstado=1;
                    $modelUserempresa->bitActivo =true;
                    $modelUserempresa->intIdUsuarioReg =0;
                    $modelUserempresa->dtiFechaReg=date('Y-m-d H:i:s');
                    $modelUserempresa->intIdUsuarioUltMod =0;
                    $modelUserempresa->dtiFechaUltMod=$modelUserempresa->dtiFechaReg;        
                    $modelUserempresa->save();                       

                    $modelacceso = new Acceso(); 
                    $modelacceso->generateToken();
                    $modelacceso->intIdUsuario =$modelUser->intIdUsuario;
                    $modelacceso->bitActivo =true;
                    $modelacceso->dtiFechaInicio = date('Y-m-d H:i:s');
                    $modelacceso->save();
                
                   Yii::$app->mailer->compose()
                           ->setTo($modellogin->vchCorreo)
                           ->setFrom('chab.28.08@gmail.com')
                           ->setSubject('Saludo de Bienvenida')
                           ->setTextBody('Bienvenido a ExpoBoda.!!!'.$modellogin->vchNombreComercial.', esperamos que disfrute su permanencia.')
                           ->send();         
                    return array('status' => true, 'data'=> $modelUser);   
         
            }else{ 
                
                   $modelacceso = new Acceso(); 
                   $modelacceso->generateToken();
                   $modelacceso->intIdUsuario =$modelUser->intIdUsuario;
                   $modelacceso->bitActivo =true;
                   $modelacceso->dtiFechaInicio = date('Y-m-d H:i:s');
                   $modelacceso->save();                   
                  return array('status' => true, 'data'=> $modelUser);  
            }
            
        }else{
                //Validar[que no exista un registro con ese correo]        
                $modelUser = new Usuario(); 
                if ($modelUser::findByUsername($modellogin->vchCorreo) == null) {                    

                }else{
                      return array('status' => false, 'data'=> 'Correo ya existe,debe registrarse con otro correo.');
                }
                 //REGISTRO DE USUARIO        
                $modelUser->vchCorreo = $modellogin->vchCorreo;
                $modelUser->setPassword($modellogin->vchClave);
                $modelUser->generatedCodeVerificacion();
                $modelUser->generateAuthKey();
                $modelUser->intCodigoEstado = $modeltablacodigo->getIdxCodigo(Usuario::STATUS_PENDIENTE_ACTIVACION);
                $modelUser->bitActivo = 1;
                $modelUser->dtiFechaReg = date('Y-m-d H:i:s');
                $modelUser->intTipoLogin = 1;
                $modelUser->intCodigoRol = 1;
                $modelUser->save();

                //REGISTRO DE USUARIOCLIENTE        
                $modelUserempresa = new Usuarioempresa();              
                $modelUserempresa->intIdUsuario =$modelUser->intIdUsuario;
                $modelUserempresa->vchRazonSocial ='';
                $modelUserempresa->vchRuc=$modellogin->vchRuc;
                $modelUserempresa->vchContacto = '';
                $modelUserempresa->vchContactoCorreo ='';
                $modelUserempresa->vchNombreComercial = $modellogin->vchNombreComercial;
                //$modelUserempresa->dtmFechaCreacion =null;
                $modelUserempresa->intIdUbigeo = 0;
                $modelUserempresa->vchDomicilioUbigeo ='';
                $modelUserempresa->vchDomicilioDireccion='';
                $modelUserempresa->vchCelular='';
                $modelUserempresa->vchTelefonoFijo='';
                $modelUserempresa->intCodigoEstado=1;
                $modelUserempresa->bitActivo =true;
                $modelUserempresa->intIdUsuarioReg =0;
                $modelUserempresa->dtiFechaReg=date('Y-m-d H:i:s');
                $modelUserempresa->intIdUsuarioUltMod =0;
                $modelUserempresa->dtiFechaUltMod=$modelUserempresa->dtiFechaReg;        
                $modelUserempresa->save();    

                Yii::$app->mailer->compose()
                        ->setTo($modellogin->vchCorreo)
                        ->setFrom('chab.28.08@gmail.com')
                        ->setSubject('Codigo de verificacion')
                        ->setTextBody('Felicitaciones.!!!'.$modellogin->vchNombreComercial.' acaba de registrar su cuenta, solo falta la activacion, para eso escriba el siguiente codigo de verificacion : '.$modelUser->vchCodVerificacion.', para confirmar su registro.')
                        ->send();         
                 return array('status' => true, 'data'=> $modelUser);
         
        }        

    }
    
    public function actionActivarcuenta(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;  
        $id= \yii::$app->request->post();        
        $modeltablacodigo = new Tablacodigo(); 
        $modelUser = new Usuario();
        $modelUser = Usuario::findIdentity($id);
        $modelUser->intCodigoEstado = $modeltablacodigo->getIdxCodigo($modelUser::STATUS_CUENTA_ACTIVADA);
        $modelUser->dtiFechaAlta =date('Y-m-d H:i:s');        
        $modelUser->dtiFechaUltMod=$modelUser->dtiFechaAlta;          
        $modelUser->save();   
        return array('status' => true, 'data'=> $modelUser);          
    }
    
    public function actionRecuperarcontrasena(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;          
        $modellogin = new LoginForm();
        $modellogin->attributes = \yii::$app->request->post();                
        $modelUser = new Usuario();        
        $modelUser = Usuario::findByUsername($modellogin->username);
        $modelUser->setPassword($modellogin->password);
        $modelUser->save();                                
        Yii::$app->mailer->compose()
                ->setTo($modelUser->vchCorreo)
                ->setFrom('chab.28.08@gmail.com')
                ->setSubject('Recuperacion de password')
                ->setTextBody('Hola .!!! acabamos reestabecer su password, nueva clave: '.$modellogin->password.' ')
                ->send();          
        return array('status' => true, 'data'=> $modelUser); 
    }
    
    public function actionValidarlogin(){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;  
        $modeltablacodigo = new Tablacodigo(); 
        $modelacceso = new Acceso(); 
        $modellogin = new LoginForm();
        $modellogin->attributes = \yii::$app->request->post();   
        $modelUser = new Usuario();        
        
        //falta verificar el tipo de rol
        if($modellogin->username=='adminexpoboda@expoboda.com'){
            if($modellogin->password=='adminexpoboda' ){
                $modelUser->intIdUsuario=999;
                $modelUser->vchCorreo='adminexpoboda@expoboda.com';
                return array('status' => true, 'data'=> $modelUser);
                
            }else{
                return array('status' => false, 'data'=>'Credenciales incorrectas');
            }            
        }else{            
            $modelUser = Usuario::findByUsername($modellogin->username);    
        }
                                
        if($modelUser == null){
            return array('status' => false, 'data'=> 'cuenta no registrada.');
        }        
            if($modelUser->validatePassword($modellogin->password)){
                // registrar acceso                                
                if($modelUser->intCodigoEstado == $modeltablacodigo->getIdxCodigo($modelUser::STATUS_CUENTA_ACTIVADA)){                   
                $modelacceso->generateToken();
                $modelacceso->intIdUsuario =$modelUser->intIdUsuario;
                $modelacceso->bitActivo =true;
                $modelacceso->dtiFechaInicio = date('Y-m-d H:i:s');
                $modelacceso->save();
                }
                return array('status' => true, 'data'=> $modelUser);
            }else{
                return array('status' => false, 'data'=>'Credenciales incorrectas');
            }            
       
    }    

   
    
}
