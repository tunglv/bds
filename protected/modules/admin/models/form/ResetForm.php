<?php
class ResetForm extends CFormModel
{
    public $password;
    public $rePassword;

    public function init(){
        parent::init();
    }
    
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        
        return array(
            array('password', 'match', 'pattern' => '/^.{6,}$/'),
            array('rePassword', 'compare', 'compareAttribute'=>'password'),
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
            'password'      =>  'Mật khẩu mới',
            'rePassword'    =>  'Gõ lại mật khẩu',
        );
    }
}
