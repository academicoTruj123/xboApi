<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tablacodigo".
 *
 * @property integer $intIdTablaCodigo
 * @property string $vchCodigo
 * @property string $vchTexto
 * @property string $vchDescripcion
 * @property boolean $bitActivo
 * @property integer $intIdUsuarioReg
 * @property string $dtiFechaReg
 * @property integer $intIdUsuarioUltMod
 * @property string $dtiFechaUltMod
 */
class Tablacodigo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tablacodigo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchCodigo', 'vchTexto', 'dtiFechaReg'], 'required'],
            [['bitActivo'], 'boolean'],
            [['intIdUsuarioReg', 'intIdUsuarioUltMod'], 'integer'],
            [['dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
            [['vchCodigo'], 'string', 'max' => 6],
            [['vchTexto'], 'string', 'max' => 200],
            [['vchDescripcion'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intIdTablaCodigo' => 'Int Id Tabla Codigo',
            'vchCodigo' => 'Vch Codigo',
            'vchTexto' => 'Vch Texto',
            'vchDescripcion' => 'Vch Descripcion',
            'bitActivo' => 'Bit Activo',
            'intIdUsuarioReg' => 'Int Id Usuario Reg',
            'dtiFechaReg' => 'Dti Fecha Reg',
            'intIdUsuarioUltMod' => 'Int Id Usuario Ult Mod',
            'dtiFechaUltMod' => 'Dti Fecha Ult Mod',
        ];
    }

    /**
     * @inheritdoc
     * @return TablacodigoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TablacodigoQuery(get_called_class());
    }
    
    public function getIdxCodigo($codigo) {        
        return static::findOne(['vchCodigo' => $codigo])->intIdTablaCodigo;           
    }
}
