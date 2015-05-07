<?php

class ContactController extends AdminController
{
    public function init(){
        parent::init();
        $this->layout = '//admin/contact/_layout';
        $this->menu_parent_selected = 'contact';

    }

    /**
     * @return array action filters
     */
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create', 'update'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->menu_child_selected = 'contact_create';
        $this->menu_sub_selected = 'create';

        $model = new Contact();

        if(isset($_POST['Contact']))
        {
//            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Contact');
            $model->attributes = $post;
//            $model->manager_id = $model->manager_id ? $model->manager_id : $this->manager->id;
//            $model->created = MyDateTime::getCurrentTime();
            $model->created = time();
            if($model->validate()) {
//                var_dump($model->validate());
//                var_dump($model->getErrors());
//                Yii::import('ext.TextParser');
//                $model->alias = $model->alias ? $model->alias : $model->name;
//                $model->alias = TextParser::toSEOString($model->alias);
                $model->setIsNewRecord(TRUE);
                $model->insert();

                Yii::app()->user->setFlash('success', "Post contact was added successful!");
                $this->refresh();
            }
        }

        $this->render('_form',array(
            'model'=>$model
        ));
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $this->menu_child_selected = 'contact_update';
        $this->menu_sub_selected = 'update';

        $model= Contact::model()->findByPk($id);

        if(isset($_POST['Contact']))
        {
//            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Catagory');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes=$post;

            if($model->validate()) {
                $model->setIsNewRecord(FALSE);

                $model->update();

                Yii::app()->user->setFlash('success', "Post contact was updated successful!");
                $this->refresh();
            }
        }


        $this->render('_form',array(
            'model'=>$model
        ));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Contact::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}