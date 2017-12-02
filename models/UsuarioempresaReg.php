<?php
namespace app\models;
use Yii;
use yii\base\Model;


class UsuarioempresaReg extends Model
{
    
    public $vchNombreComercial;
    public $vchRuc;
    public $vchCorreo;
    public $vchClave;
    public $intTipoLogin;   

    
    /**
     * @inheritdoc
     */
    public function rules()
    {         
         return [
            [['vchCorreo', 'vchClave', 'vchNombreComercial','vchRuc'], 'required'],
            [['intTipoLogin'], 'integer'],
            [['vchCorreo'], 'string', 'max' => 250],
            [['vchClave'], 'string', 'max' => 20],            
            [['vchRuc'], 'string', 'max' => 11],
            [['vchNombreComercial'], 'string', 'max' => 200],
        ];                
    }
  
}