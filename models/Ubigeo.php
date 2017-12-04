<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubigeo".
 *
 * @property integer $intIdubigeo
 * @property string $vchCodigo
 * @property string $vchCodDepartamento
 * @property string $vchCodigoProvincia
 * @property string $vchCodigoDistrito
 * @property string $vchUbigeo
 * @property integer $intNivel
 */
class Ubigeo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubigeo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intNivel'], 'integer'],
            [['vchCodigo'], 'string', 'max' => 6],
            [['vchCodDepartamento', 'vchCodigoProvincia', 'vchCodigoDistrito'], 'string', 'max' => 2],
            [['vchUbigeo'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intIdubigeo' => 'Int Idubigeo',
            'vchCodigo' => 'Vch Codigo',
            'vchCodDepartamento' => 'Vch Cod Departamento',
            'vchCodigoProvincia' => 'Vch Codigo Provincia',
            'vchCodigoDistrito' => 'Vch Codigo Distrito',
            'vchUbigeo' => 'Vch Ubigeo',
            'intNivel' => 'Int Nivel',
        ];
    }
}
