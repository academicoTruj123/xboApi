<?php

namespace app\models;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $intIdUsuario
 * @property string $vchCorreo
 * @property string $vchClave
 * @property string $vchAuthKey
 * @property string $vchCodVerificacion
 * @property integer $intCodigoEstado
 * @property string $dtiFechaAlta
 * @property string $dtiFechaBaja
 * @property boolean $bitActivo
 * @property string $dtiFechaReg
 * @property string $dtiFechaUltMod
 * @property integer $intTipoLogin
 * @property integer $intCodigoRol
 * @property integer $intTipoUsuario
 */
class Usuario extends \yii\db\ActiveRecord  implements IdentityInterface
{
  
    const STATUS_PENDIENTE_ACTIVACION = '0101';
    const STATUS_CUENTA_ACTIVADA = '0102';
    const STATUS_CUENTA_SUSPENDIDA = '0103';
    const STATUS_CUENTA_DESACTIVADA = '0104';
        
    const ROL_CLIENTE = '0301';
    const ROL_EMPRESA = '0302';
    const ROL_ADMINISTRADOR = '0303';   
    
    const TIPO_CLIENTE = '0401';
    const TIPO_EMPRESA = '0402';
    const TIPO_ADMINISTRADOR = '0403'; 
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc intIdUsuario
     */
    public function rules()
    {
        return [
            [['vchCorreo', 'vchClave', 'vchCodVerificacion', 'intCodigoEstado', 'dtiFechaReg'], 'required'],
            [['intIdUsuario','intCodigoEstado', 'intTipoLogin', 'intCodigoRol','intTipoUsuario'], 'integer'],
            [['dtiFechaAlta', 'dtiFechaBaja', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
            [['bitActivo'], 'boolean'],
            [['vchCorreo'], 'string', 'max' => 250],
            [['vchClave'], 'string', 'max' => 128],
            [['vchAuthKey', 'vchCodVerificacion'], 'string', 'max' => 200],
            [['vchCorreo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intIdUsuario' => 'Int Id Usuario',
            'vchCorreo' => 'Vch Correo',
            'vchClave' => 'Vch Clave',
            'vchAuthKey' => 'Vch Auth Key',
            'vchCodVerificacion' => 'Vch Cod Verificacion',
            'intCodigoEstado' => 'Int Codigo Estado',
            'dtiFechaAlta' => 'Dti Fecha Alta',
            'dtiFechaBaja' => 'Dti Fecha Baja',
            'bitActivo' => 'Bit Activo',
            'dtiFechaReg' => 'Dti Fecha Reg',
            'dtiFechaUltMod' => 'Dti Fecha Ult Mod',
            'intTipoLogin' => 'Int Tipo Login',
            'intCodigoRol' => 'Int Codigo Rol',
            'intTipoUsuario' => 'Int Tipo Usuario',
        ];
    }

    public function getAuthKey() {
        return $this->vchAuthKey;
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;        
    }

    public static function findIdentity($id) {        
        return static::findOne(['intIdUsuario' => $id]);        
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public static function findByUsernameTipoLogin($correo,$tipologin)
    {
        return static::findOne(['vchCorreo' => $correo,'intTipoLogin' => $tipologin]);
    }
    
    public static function findByUsernameTipoUsuario($correo,$tipousuario)
    {
        return static::findOne(['vchCorreo' => $correo,'intTipoUsuario' => $tipousuario]);
    }
    
    public static function findByUsername($correo)
    {
        return static::findOne(['vchCorreo' => $correo]);
    }
    
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->vchClave);
    }
    
   public function setPassword($password)
   {
        $this->vchClave = Yii::$app->security->generatePasswordHash($password);
   }
    
    public function generateAuthKey()
    {
        $this->vchAuthKey = Yii::$app->security->generateRandomString();
    }
    
    public function generatedCodeVerificacion()
    {                
        $this->vchCodVerificacion = Yii::$app->security->generateRandomString(4);
    }
    

}
