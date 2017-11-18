<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;


class DefaultController extends ActiveController
{  
    //public $enabledCsrfValidation = false;
    public $modelClass = 'app\models\Pruebarest';  
}
