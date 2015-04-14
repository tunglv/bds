<?php

class WebModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'web.models.*',
            'web.components.widgets.user.*',
            'web.components.*',
//			'web.extensions.facebook.src.Facebook',
		)); 

        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'errorAction'=>'/web/page/error',
            ),
            'user' => array(
                'class' => 'web.components.WebUser',
                'allowAutoLogin'=>true,
                'loginUrl'=>array('/web/user/login'),
            ),
            'userAdmin' => array(
                'class' => 'admin.components.AdminWebUser',
                'allowAutoLogin'=>true,
                'loginUrl'=>array('/admin/manager/login'),
            ),
//            'cache' => array(
//                'class' => 'CFileCache',
//                'cachePath' => 'protected/runtime/cache/shop/'.Yii::app()->request->getQuery('alias', '@trash'),
//            ),
        ));

        
        Yii::app()->theme = 'web'; 
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
