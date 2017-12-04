<?php

namespace app\controllers;
use Yii;
use yii\base\Model;
use app\models\Ubigeo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;


class UbigeorestController extends ActiveController
{
    public $modelClass ='app\models\Ubigeo';        
}
