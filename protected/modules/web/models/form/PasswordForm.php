<?php
    class PasswordForm extends CFormModel
    {
        public $oldPassword;
        public $newPassword;
        public $reNewPassword;


        public function init(){

        }


        public function rules()
        {
            return array(
                array('oldPassword', 'required', 'on' => 'changePassword'),
                array('oldPassword', 'checkOldPassword', 'on' => 'changePassword'),

                array('newPassword, reNewPassword', 'required', 'message' => '{attribute} phải được điền'),
                array('newPassword', 'match', 'pattern' => '/^.{6,}$/', 'message' => '{attribute} phải từ 6 ký tự trở lên'),
                array('reNewPassword', 'compare', 'compareAttribute'=>'newPassword', 'message' => 'Mật khẩu mới gõ lại  không chính xác'),
            );
        }

        public function checkOldPassword($attribute,$params)
        {
            $user = Yii::app()->user->user;
            if(!$user->checkPassword($this->oldPassword, $user->password)){
                $this->addError('oldPassword','Mật khẩu cũ không chính xác');
            }
        }

        public function attributeLabels()
        {
            return array(
                'oldPassword'    =>  'Mật khẩu cũ',
                'newPassword'    =>  'Mật khẩu mới',
                'reNewPassword'    =>  'Nhập lại mật khẩu mới',
            );
        }


}