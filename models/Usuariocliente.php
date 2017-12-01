<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuariocliente".
 *
 * @property integer $intIdUsucliente
 * @property integer $intIdUsuario
 * @property string $vchNombres
 * @property string $vchApellidoPaterno
 * @property string $vchApellidoMaterno
 * @property integer $intCodigoSexo
 * @property string $dtmFechaNacimiento
 * @property integer $intIdUbigeo
 * @property string $vchDomicilioUbigeo
 * @property string $vchDomicilioDireccion
 * @property string $vchDomicilioReferencia
 * @property string $vchCelular
 * @property string $vchTelefonoFijo
 * @property string $dtiFechaAlta
 * @property string $dtiFechaBaja
 * @property integer $intCodigoEstado
 * @property boolean $bitActivo
 * @property integer $intIdUsuarioReg
 * @property string $dtiFechaReg
 * @property integer $intIdUsuarioUltMod
 * @property string $dtiFechaUltMod
 */
class Usuariocliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuariocliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdUsuario', 'dtiFechaReg', 'dtiFechaUltMod'], 'required'],
            [['intIdUsuario', 'intCodigoSexo', 'intIdUbigeo', 'intCodigoEstado', 'intIdUsuarioReg', 'intIdUsuarioUltMod'], 'integer'],
            [['dtmFechaNacimiento', 'dtiFechaAlta', 'dtiFechaBaja', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
            [['bitActivo'], 'boolean'],
            [['vchNombres', 'vchDomicilioUbigeo', 'vchDomicilioDireccion', 'vchDomicilioReferencia'], 'string', 'max' => 200],
            [['vchApellidoPaterno', 'vchApellidoMaterno'], 'string', 'max' => 100],
            [['vchCelular', 'vchTelefonoFijo'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intIdUsucliente' => 'Int Id Usucliente',
            'intIdUsuario' => 'Int Id Usuario',
            'vchNombres' => 'Vch Nombres',
            'vchApellidoPaterno' => 'Vch Apellido Paterno',
            'vchApellidoMaterno' => 'Vch Apellido Materno',
            'intCodigoSexo' => 'Int Codigo Sexo',
            'dtmFechaNacimiento' => 'Dtm Fecha Nacimiento',
            'intIdUbigeo' => 'Int Id Ubigeo',
            'vchDomicilioUbigeo' => 'Vch Domicilio Ubigeo',
            'vchDomicilioDireccion' => 'Vch Domicilio Direccion',
            'vchDomicilioReferencia' => 'Vch Domicilio Referencia',
            'vchCelular' => 'Vch Celular',
            'vchTelefonoFijo' => 'Vch Telefono Fijo',
            'dtiFechaAlta' => 'Dti Fecha Alta',
            'dtiFechaBaja' => 'Dti Fecha Baja',
            'intCodigoEstado' => 'Int Codigo Estado',
            'bitActivo' => 'Bit Activo',
            'intIdUsuarioReg' => 'Int Id Usuario Reg',
            'dtiFechaReg' => 'Dti Fecha Reg',
            'intIdUsuarioUltMod' => 'Int Id Usuario Ult Mod',
            'dtiFechaUltMod' => 'Dti Fecha Ult Mod',
        ];
    }
}
