<?php

class ChangePasswordForm extends CFormModel
{
  public $currentPassword;
  public $newPassword;
  public $newPassword_repeat;
  private $_user;
  
  public function rules()
  {
    return array(
      array(
        'currentPassword', 'compareCurrentPassword'
      ),
      array(
        'currentPassword, newPassword, newPassword_repeat', 'required',
        
      ),
      array(
        'newPassword_repeat', 'compare',
        'compareAttribute'=>'newPassword',
        
      ),
      
    );
  }
  
  public function compareCurrentPassword($attribute,$params)
  {
    if( md5($this->currentPassword) !== $this->_user->password )
    {
      $this->addError($attribute,'La contraseña actual es incorrecta');
    }
  }
  
  public function init()
  {
         $userId = Yii::app()->user->id;
    $this->_user = Users::model()->findByAttributes(array('id'=>$userId));
  }
  
  public function attributeLabels()
  {
    return array(
      'currentPassword'=>'Contraseña actual',
      'newPassword'=>'Nueva contraseña',
      'newPassword_repeat'=>'Nueva contraseña (Repetir)',
    );
  }
  
  public function changePassword()
  {
    $this->_user->password = $this->newPassword;
    if( $this->_user->save() )
      return true;
    return false;
  }
}
