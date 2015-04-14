<?php

class ManagerController extends AdminController
{   
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('login', 'forgot','captcha','logout'),
                'users'=>array('*'),
            ),
            array('allow',
                'actions'=>array('index'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('create', 'reset'),
                'users'=>array('@'),
                'expression' =>  '$user->manager->isManager',
            ),
            array('allow',
                'actions'=>array('update'),
                'users'=>array('@'),
                'expression' =>  array($this, 'ruleCheckUpdate'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'users'=>array('@'),
                'expression' =>  array($this, 'ruleCheckDelete'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }    
    
    public function ruleCheckUpdate($user){
        $id = Yii::app()->request->getQuery('id');
        if($id){
            $manager = Manager::model()->findByAttributes(array('id' => $id));
            if(!$manager) return FALSE;
            
            if($user->manager->isStaffOnly){
                if($user->manager->id != $manager->id) return FALSE;
            }
            
            if($user->manager->isManagerOnly){
                if($manager->isManager && $manager->id != $user->manager->id) return FALSE;
            }
        }
        return TRUE;
    }
    
    public function ruleCheckDelete($user){
        $id = Yii::app()->request->getQuery('id');

        $manager = Manager::model()->findByPk($id);
        if(!$manager || $manager->isAdmin || $user->manager->isStaffOnly) return FALSE;
        
        if($user->manager->isManagerOnly){
            if($manager->isManager) return FALSE;
        }
        
        if($user->manager->isAdmin){
            if($manager->isAdmin) return FALSE;
        }

        return TRUE;
    }
    
    public function init(){
        parent::init();
        $this->menu_parent_selected = 'manager';
    }
    
    
    private function _send_mail($from_email, $from_name, $to_email, $subject, $content){
        // send password to email
        $mail_server    = Yii::app()->params['mail_server'];
        
        $mail = Yii::createComponent('application.extensions.mailer.EMailer');
        $mail->CharSet    = 'UTF-8';

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        //$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
        $mail->Host       = $mail_server['host'];      // sets GMAIL as the SMTP server
        $mail->Port       = $mail_server['port'];                   // set the SMTP port for the GMAIL server
        $mail->Username   = $mail_server['username'];  // GMAIL username
        $mail->Password   = $mail_server['password'];            // GMAIL password
        
        $mail->SetFrom($from_email, $from_email.' - '.$from_name);
        $mail->AddReplyTo($from_email, $from_email.' - '.$from_name);
        
        $mail->AddAddress($to_email, $to_email);
        $mail->Subject    = $subject;
        $mail->Body    = $content;
        $mail->send();
    }
   
    
    public function actionForgot($token = NULL)
    {
        if($this->manager) $this->redirect(array('/admin/manager/update'));
        
        $this->menu_child_selected = 'manager';
        $this->menu_sub_selected = 'index';
        
        // check token reset
        if($token){
            list($manager_id, $reset_time) = json_decode(Yii::app()->crypt->decode($token));

            $manager = Manager::model()->findByPk($manager_id);
            if($manager && ($manager->reset_time == $reset_time) && (strtotime(MyDateTime::getCurrentTime()) <= strtotime($manager->reset_time) + 3600)){
                // remove reset_time
                $manager->reset_time = NULL;
                $manager->setIsNewRecord(FALSE);
                $manager->update();
                
                // login and redirect to reset page
                $userIdentity = new CUserIdentity($manager->id, '');
                $userIdentity->setState('id', $manager->id);
                $userIdentity->setState('name', $manager->email);
                Yii::app()->user->login($userIdentity, Yii::app()->params->userRemember);
                
                Yii::app()->session['reset_password'] = TRUE;
                Yii::app()->user->setFlash('success', "Thay đổi mật khẩu mới cho tài khoản của bạn.");
                $this->redirect(array('/admin/manager/reset'));
            }
            else
            {
                Yii::app()->user->setFlash('error', "Link reset đã hết hạn hoặc không hợp lệ. Bạn hãy điền lại form để lấy lại link reset mới.");
                $this->redirect(array('/admin/manager/forgot'));
            }
        }

        Yii::import('admin.models.form.ForgotForm');

        $model = new ForgotForm();
        
        // if it is ajax validation request
//        if(isset($_POST['ajax']) && $_POST['ajax']==='forgot-form')
//        {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
        
        if(isset($_POST['ForgotForm']))
        {
            $post = $_POST['ForgotForm'];
            $model->attributes = $post;

            if($model->validate())
            {
                $manager = Manager::model()->findByAttributes(array('email' => $post['username_email']));
                
                // save reset time
                $manager->reset_time = MyDateTime::getCurrentTime();
                $manager->setIsNewRecord(FALSE);
                $manager->update();

                // generate password reset_url
                $token = Yii::app()->crypt->encode(json_encode(array($manager->id, $manager->reset_time)));
                $password_reset_url = $this->createAbsoluteUrl('/admin/manager/forgot', array(
                    'token' => $token
                ));
                
                // send password to email
                $mail_receiver  = Yii::app()->params['mail_receiver'];
                $from_email = $mail_receiver['email'];
                $from_name = $mail_receiver['name'];
                $subject    = 'Reset mật khẩu';
                
                $content    = "Chúng tôi vừa nhập được một yêu cầu reset mật khẩu của bạn.

Để reset mật khẩu, bạn hãy click vào link bên dưới hoặc copy và paste vào trình duyệt:
{$password_reset_url}

Link reset này có thời hạn trong 60 phút. Nếu bạn không muốn reset mật khẩu, hãy bỏ qua email này và mật khẩu của bạn vẫn sẽ được giữ nguyên.";

//echo "<pre>";print_r($content);echo "<pre>";die;
                $this->_send_mail($from_email, $from_name, $manager->email, $subject, $content);
                
                
                Yii::app()->user->setFlash('success', "Chúng tôi đã gửi link reset mật khẩu tới email của bạn: {$manager->email}. Check mail trong Inbox hoặc Spam.<br>Nếu bạn không nhận được email trong vài phút, hãy submit lại form..");
                
                $this->refresh();
            }
            
        }
        
        
        $this->layout = '//layouts/login';
        $this->pageTitle = 'Quên mật khẩu';

        $this->render('forgot', array('model' => $model));
    }
 
    
    
    
    public function actionReset()
    {
        $reset_password = Yii::app()->session['reset_password'];
        if(!$reset_password) $this->redirect(array('/admin/manager/update'));

        Yii::import('admin.models.form.ResetForm');

        $model = new ResetForm();
        
        // if it is ajax validation request
//        if(isset($_POST['ajax']) && $_POST['ajax']==='reset-form')
//        {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
        
        if(isset($_POST['ResetForm']))
        {
            $post = $_POST['ResetForm'];
            $model->attributes = $post;

            if($model->validate())
            {
                $manager = $this->manager;
                $manager->setIsNewRecord(FALSE);
                $manager->password = $manager->getHashPassword($post['password']);
                $manager->update();

                Yii::app()->session->remove('reset_password');
                
                Yii::app()->user->setFlash('success', 'Mật khẩu của bạn đã được thay đổi.');
                $this->redirect(array('/admin/manager/update'));
            }
            
        }
        
        $this->pageTitle = "Reset mật khẩu";
        $this->layout = '//layouts/login';
        
        $this->render('reset', array('model' => $model));
          
    } 
    
    
	public function actionIndex()
	{
        $this->layout = '//admin/manager/_layout'; 
        $this->menu_child_selected = 'manager';
        $this->menu_sub_selected = 'index';
        
        $model = new Manager('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Manager'])) $model->attributes=$_GET['Manager'];
            
		$this->render('index', array(
            'model' => $model
        ));
	}
    
    public function actionCreate()
    {
        $this->layout = '//admin/manager/_layout';
        $this->menu_child_selected = 'manager_create';
        $this->menu_sub_selected = 'create';
        
        $model = new Manager('create');
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='manager-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        

        if(isset($_POST['Manager'])) {
            $model->attributes = Yii::app()->request->getPost('Manager');
            
            if($model->validate()) {
                $model->password = $model->getHashPassword($model->password);
                $model->insert();
                $model->unsetAttributes();
                Yii::app()->user->setFlash('success', 'Thêm nhân viên thành công.');
                $this->refresh();
            }
        }
        
        $this->render('_form', array(
            'model' => $model
        ));
    }
    
    /**
    * TODO: fix loi tat ca deu cap nhap dc pass cua admin va nguoi khac @@
    *
    */
    public function actionUpdate($id = NULL)
    {
        $this->layout = '//admin/manager/_layout';
        $this->menu_child_selected = null;
        $this->menu_sub_selected = 'update';
        
        $model = $id ? $this->loadModel($id) : $this->manager;
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='manager-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        $oldPassword = $model->password;
        if(isset($_POST['Manager'])) {
            $model->attributes = Yii::app()->request->getPost('Manager');
            
            if($model->validate()) {
                $model->password = $model->password ? $model->getHashPassword($model->password) : $oldPassword; 
                $model->update();
                Yii::app()->user->setFlash('success', 'Cập nhật tài khoản thành công.');
                $this->refresh();
            }
        }
        $model->password = null;
        $this->render('_form', array(
            'model' => $model
        ));
    }
    
    /**
    * xoa nhan vien
    * 
    * @param mixed $alias
    * @param mixed $id
    */
    public function actionDelete($id) {
        $manager = $this->loadModel($id);
        $manager->delete();
        echo "Xóa tài khoản {$manager->email} thành công";
        
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
    
    private function loadModel($id) {
        $model = Manager::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
    
    
    public function actionLogin()
    {
//        echo '<pre>';print_r(Manager::model()->getHashPassword('123456'));echo '</pre>';die;
        if(!Yii::app()->user->isGuest) $this->redirect(array('/admin'));
        $this->layout = '//layouts/login';

        if(isset($_POST['username']))
        {    
            $identity = new AdminUserIdentity($_POST['username'], $_POST['password']);
            if($identity->authenticate()){
                Yii::app()->user->login($identity, Yii::app()->params->userRemember);
                Yii::app()->request->redirect(Yii::app()->user->returnUrl);
            }
            Yii::app()->user->setFlash('error', $identity->errorMessage);

        }
        
        $this->pageTitle = 'Đăng nhập';
        $this->render('login');
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('/admin'));
    }
}