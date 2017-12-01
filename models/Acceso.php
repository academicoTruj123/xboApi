<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acceso".
 *
 * @property integer $intIdAcceso
 * @property string $vchToken
 * @property integer $intIdUsuario
 * @property boolean $bitActivo
 * @property string $dtiFechaInicio
 * @property string $dtiFechaFin
 */
class Acceso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acceso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchToken', 'intIdUsuario', 'dtiFechaInicio'], 'required'],
            [['intIdUsuario'], 'integer'],
            [['bitActivo'], 'boolean'],
            [['dtiFechaInicio', 'dtiFechaFin'], 'safe'],
            [['vchToken'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intIdAcceso' => 'Int Id Acceso',
            'vchToken' => 'Vch Token',
            'intIdUsuario' => 'Int Id Usuario',
            'bitActivo' => 'Bit Activo',
            'dtiFechaInicio' => 'Dti Fecha Inicio',
            'dtiFechaFin' => 'Dti Fecha Fin',
        ];
    }
    
    public function generateToken()
    {
        $this->vchToken = Yii::$app->security->generateRandomString();
    }
    

    
}
