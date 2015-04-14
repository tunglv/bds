<?php
class UpdateForm extends CFormModel
{    
    public $username;
    public $email;
    public $name;
    public $dob;
    public $gender;
    public $website;

    public $upload_method = 'file';
    public $image_file;
    public $image_url;
    
    public $role;
    
    public $oldPassword;
    public $newPassword;
    public $reNewPassword;
    
    public $user;
    
    public function init(){
        parent::init();
        $this->user = Yii::app()->user->user;
        
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->name = $this->user->name ? $this->user->name : NULL;
        $this->dob = $this->user->dob ? date('d-m-Y', strtotime($this->user->dob)) : NULL;
        $this->gender = $this->user->gender ? strtoupper($this->user->gender) : NULL;
        $this->website = $this->user->website ? $this->user->website : NULL;
        
        $this->role = $this->user->role ? $this->user->role : NULL;
    }
   
   
    public function rules()
    {
        
        return array(
            array('oldPassword', 'checkOldPassword'),
            array('newPassword', 'match', 'pattern' => '/^.{6,}$/', 'message' => '{attribute} phải từ 6 ký tự trở lên'),
            array('reNewPassword', 'compare', 'compareAttribute'=>'newPassword', 'message' => 'Mật khẩu mới gõ lại  không chính xác'),
            array('dob', 'date', 'format'=>array('dd-MM-yyyy','d-M-yyyy', 'd-M-yy'), 'allowEmpty'=>true, 'message' => '{attribute} không hợp lệ'),

            array('email, name, oldPassword, newPassword,reNewPassword ', 'safe'),
        );
    }

    
    public function checkOldPassword($attribute,$params)
    {
        if(($this->newPassword && $this->reNewPassword) || ($this->email != $this->user->email))
        {
            if(!$this->oldPassword){
                $this->addError('oldPassword', Yii::t('user', 'Current password cannot be blank.'));
            }
            elseif(!$this->user->checkPassword($this->oldPassword, $this->user->password)){
                $this->addError('oldPassword', Yii::t('user', 'Current password is incorrect.'));
            } 
        }
    }

    public function checkEmail($attribute,$params)
    {
        if($this->email && ($this->email != $this->user->email))
        {
            $user = User::model()->findByAttributes(array('email' => $this->email));
            if($user){
                $this->addError('email', Yii::t('user', 'Email has been used with another account'));
            }
                
        }
    }

    
    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'email'    =>  'Email',
            'name'    =>  Yii::t('user', 'Fullname'),
            'oldPassword'    =>  Yii::t('user', 'Current password'),
            'newPassword'    =>  Yii::t('user', 'New password'),
            'reNewPassword'    =>  Yii::t('user', 'Re-new password'),
            'dob'    =>  Yii::t('user', 'Birthday'),
            'website'    =>  Yii::t('user', 'Website'),
            'gender'    =>  Yii::t('user', 'Gender'),
            'image'    =>  Yii::t('user', 'Avatar'),
            'upload_method'    =>  Yii::t('user', 'Upload method'),
        );
    }
}