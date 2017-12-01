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
        
}
