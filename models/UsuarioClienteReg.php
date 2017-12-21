<?php
namespace app\models;
use Yii;
use yii\base\Model;


/**
 * @property string $vchNombres
 * @property string $vchCorreo
 * @property string $vchClave  
 * @property integer $intTipoLogin
 */
class UsuarioClienteReg extends Model
{    
    public $vchNombres;
    public $vchCorreo;
    public $vchClave;
    public $intTipoLogin;   
    public $vchTipoLogin;  
    const LOGIN_CUENTA_SISTEMA = '0201';
    const LOGIN_CUENTA_FACEBOOK = '0202';   
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vchCorreo', 'vchClave', 'vchNombres'], 'required'],
            [['intTipoLogin'], 'integer'],
            [['vchCorreo'], 'string', 'max' => 250],
            [['vchClave'], 'string', 'max' => 128],            
            [['vchNombres'], 'string', 'max' => 200],
            [['vchTipoLogin'], 'string', 'max' => 6],
        ];
    }
  
}
