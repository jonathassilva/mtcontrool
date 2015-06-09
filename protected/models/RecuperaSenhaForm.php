<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RecuperaSenhaForm extends CFormModel
{
 //   public $user_name;
    public $email;
    public $user_name;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // matricula, email, subject and body are required
            //array('matricula, email', 'required'),
            //array('email', 'required'),
            array('user_name', 'required'),
            // email has to be a valid email address
            //array('email', 'email'),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'verifyCode'=>'Código de verificação',
            //'email'=>'Email',
            'user_name'=>'User name',
        );
    }
}
