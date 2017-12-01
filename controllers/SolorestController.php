<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * PruebarestController implements the CRUD actions for Pruebarest model.
 */
class SolorestController extends ActiveController
{
    public $modelClass ='app\models\TablaPrueba';

    
    public function init()
    {
        parent::init();
        echo "llego al init"; die();       
    }
}
