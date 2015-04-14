<?php

class CatagoryController extends AdminController
{
    public function init(){
        parent::init();
        $this->layout = '//admin/catagory/_layout';
        $this->menu_parent_selected = 'catagory';

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
                'actions'=>array('create', 'index', 'update','delete'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Index of page handbook
     * list of handbook
     */
    public function actionIndex() {
        $this->menu_child_selected = 'catagory';
        $this->menu_sub_selected = 'index';

        $model = new Catagory();
        $model->unsetAttributes();  // clear any default values

        $criteria=new CDbCriteria;
        $criteria->select = '
            t.id,
            t.title,
            t.created,
            t.parent_id
            ';
//            $criteria->order = 't.id ASC';
//        $criteria->with = array(
//            'manager' => array(
//                'select' => 'name'
//            ),
//        );

        if($catagoryFilter = Yii::app()->request->getQuery('Catagory')){
            $model->attributes = $catagoryFilter;
            if(isset($catagoryFilter['title']) && $catagoryFilter['title']) $criteria->compare('t.title', $catagoryFilter['title']);
            if(isset($catagoryFilter['parent_id']) && $catagoryFilter['parent_id']) {
                $criteria->addCondition("t.parent_id = {$catagoryFilter['parent_id']} OR t.id = {$catagoryFilter['parent_id']}");
//                $criteria->compare('t.parent_id', $catagoryFilter['parent_id']);
//                $criteria->compare('t.id', $catagoryFilter['parent_id']);
            }
//            if(isset($catagoryFilter['id']) && $catagoryFilter['id']) $criteria->compare('t.id', $catagoryFilter['id']);
//            if(isset($catagoryFilter['status']) && $catagoryFilter['status']) $criteria->compare('t.status', $catagoryFilter['status']);
//            if(isset($catagoryFilter['manager_id']) && $catagoryFilter['manager_id']) $criteria->compare('t.manager_id', $catagoryFilter['manager_id']);
        }


        $dataProvider = new CActiveDataProvider('Catagory', array(
            'criteria'=>$criteria,
            'sort'=>array(      // CSort
                'defaultOrder' => 't.id DESC',
            ),

            'pagination' => array(
                'pageSize' => 30,
                //                    'totalItemCount' => 'page',
                'pageVar' => 'page',
            ),
        ));

        $this->render('index', array('model'=>$model, 'dataProvider'=>$dataProvider));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $this->menu_child_selected = 'catagory_create';
        $this->menu_sub_selected = 'create';

        $model = new Catagory();

        if(isset($_POST['Catagory']))
        {
//            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Catagory');
            $model->attributes = $post;
            $model->parent_id = $model->parent_id ? $model->parent_id : 0;
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

                Yii::app()->user->setFlash('success', "Post {$model->title} was added successful!");
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
        $this->menu_child_selected = 'catagory_update';
        $this->menu_sub_selected = 'update';

        $model= Catagory::model()->findByPk($id);

        if(isset($_POST['Catagory']))
        {
//            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Catagory');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes=$post;
            $model->parent_id = $model->parent_id ? $model->parent_id : 0;
//            $model->created = $model->created ? $model->created : MyDateTime::getCurrentTime();
//            $model->changed = MyDateTime::getCurrentTime();
//            $model->manager_id = $model->manager_id ? $model->manager_id : $this->manager->id;
            if($model->validate()) {
//                Yii::import('ext.TextParser');
//                $model->alias = $model->alias ? $model->alias : $model->name;
//                $model->alias = TextParser::toSEOString($model->alias);
                $model->setIsNewRecord(FALSE);

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was updated successful!");
                $this->refresh();
            }
        }


        $this->render('_form',array(
            'model'=>$model
        ));
    }
    /**
     * delete a particular model.
     * If delete is successful, the browser will be reloaded page.
     * @param integer $id the ID of the model to be delete
     */
    public function actionDelete($id) {
        $catagory = Catagory::model()->findByPk($id);
//        $catagory->status = 'DISABLE';
        $catagory->delete();

        //TODO delete file in disk

        echo "Xóa dòng sản phẩm {$catagory->title} thành công";

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Catagory::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}