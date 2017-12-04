<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarioempresa".
 *
 * @property integer $intIdUsuempresa
 * @property integer $intIdUsuario
 * @property string $vchRazonSocial
 * @property string $vchRuc
 * @property string $vchContacto
 * @property string $vchContactoCorreo
 * @property string $vchNombreComercial
 * @property string $dtmFechaCreacion
 * @property integer $intIdUbigeo
 * @property string $vchDomicilioUbigeo
 * @property string $vchDomicilioDireccion
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
class Usuarioempresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarioempresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdUsuario', 'dtiFechaReg', 'dtiFechaUltMod'], 'required'],
            [['intIdUsuario', 'intIdUbigeo', 'intCodigoEstado', 'intIdUsuarioReg', 'intIdUsuarioUltMod'], 'integer'],
            [['dtmFechaCreacion', 'dtiFechaAlta', 'dtiFechaBaja', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
            [['bitActivo'], 'boolean'],
            [['vchRazonSocial', 'vchNombreComercial', 'vchDomicilioUbigeo', 'vchDomicilioDireccion'], 'string', 'max' => 200],
            [['vchRuc'], 'string', 'max' => 11],
            [['vchContacto', 'vchContactoCorreo'], 'string', 'max' => 150],
            [['vchCelular', 'vchTelefonoFijo'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intIdUsuempresa' => 'Int Id Usuempresa',
            'intIdUsuario' => 'Int Id Usuario',
            'vchRazonSocial' => 'Vch Razon Social',
            'vchRuc' => 'Vch Ruc',
            'vchContacto' => 'Vch Contacto',
            'vchContactoCorreo' => 'Vch Contacto Correo',
            'vchNombreComercial' => 'Vch Nombre Comercial',
            'dtmFechaCreacion' => 'Dtm Fecha Creacion',
            'intIdUbigeo' => 'Int Id Ubigeo',
            'vchDomicilioUbigeo' => 'Vch Domicilio Ubigeo',
            'vchDomicilioDireccion' => 'Vch Domicilio Direccion',
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
    
    public static function findByIdUser($id)
    {
        return static::findOne(['intIdUsuario' => $id]);
    }
    
    
}
