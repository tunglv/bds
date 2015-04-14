<?php

class ProductController extends AdminController {

    public function init() {
        parent::init();
        $this->layout = '//admin/product/_layout';
        $this->menu_parent_selected = 'product';
    }

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'index', 'update', 'delete','getCatagory'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * axjax get child catagory by id of parent catagory.
     * @param integer $id the ID of the catagory is send by method post via call ajax
     * return json child catagory
     */
    public function actionGetCatagory(){
        $id = Yii::app()->request->getPost("id");

        $catagory = Catagory::model()->getChildLabel($id);

        echo json_encode($catagory);die;
    }

    /**
     * Index of page handbook
     * list of handbook
     */
    public function actionIndex() {
        $this->menu_child_selected = 'product';
        $this->menu_sub_selected = 'index';

        $model = new Document();
        $model->unsetAttributes();  // clear any default values

        $criteria = new CDbCriteria;
//            $criteria->order = 't.id ASC';
        $criteria->with = array(
            'manager' => array(
                'select' => 'name'
            ),
        );

        if ($productFilter = Yii::app()->request->getQuery('Document')) {
            $model->attributes = $productFilter;
            if (isset($productFilter['title']) && $productFilter['title'])
                $criteria->compare('t.title', $productFilter['title'], true);
            if (isset($productFilter['status']) && $productFilter['status'])
                $criteria->compare('t.status', $productFilter['status']);
            if (isset($productFilter['type']) && $productFilter['type'])
                $criteria->compare('t.type', $productFilter['type']);
            if (isset($productFilter['catagory_parent']) && $productFilter['catagory_parent'])
                $criteria->compare('t.catagory_parent', $productFilter['catagory_parent']);
            if (isset($productFilter['catagory_id']) && $productFilter['catagory_id'])
                $criteria->compare('t.catagory_id', $productFilter['catagory_id']);
            if (isset($productFilter['author']) && $productFilter['author'])
                $criteria->compare('t.author', $productFilter['author'], true);
        }


        $dataProvider = new CActiveDataProvider('Document', array(
                    'criteria' => $criteria,
                    'sort' => array(// CSort
                        'defaultOrder' => 't.id DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                        //                    'totalItemCount' => 'page',
                        'pageVar' => 'page',
                    ),
                ));
        $this->render('index', array('model' => $model, 'dataProvider' => $dataProvider));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->menu_child_selected = 'product_create';
        $this->menu_sub_selected = 'create';

        $model = new Document();

        $imgConf = Yii::app()->params->product;

        if (isset($_POST['Document'])) {
//            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Document');
            $model->attributes = $post;
            $model->manager_id = $this->manager->id;
            $model->link = 'default';
            $model->created = time();
//            Yii::import('ext.TextParser');
//            $model->alias = $model->alias ? $model->alias : $model->name;
//            $model->alias = TextParser::toSEOString($model->alias);

//            var_dump($model->validate());
//            var_dump($model->getErrors());die;

            if ($model->validate()) {
                $model->setIsNewRecord(TRUE);
                $model->insert();

                if(isset($_FILES['video_file']['tmp_name']) && filesize($_FILES['video_file']['tmp_name'])>0){
                    //////////// VIDEO //////////
                    $uploaddir = 'upload/document/'.$model->id.'/';
                    if (!file_exists($uploaddir))
                        mkdir($uploaddir, 0777, true);
                    $max_filesize = 10485760;
                    //you should specify the value you want to be maximum of video.

                    if(filesize($_FILES['video_file']['tmp_name']) > $max_filesize)
                        die('File quá lớn.');

                    $file = basename($_FILES['video_file']['name']);
                    $uploadfile = $uploaddir . $file;

                    if (move_uploaded_file($_FILES['video_file']['tmp_name'], $uploadfile)) {
                        $model->link = $file;
                    }
                    else {
                        echo "ERROR";
                    }
                }

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was added successful!");
                $this->refresh();
            }
        }

        $this->render('_form', array(
            'model' => $model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->menu_child_selected = 'product_update';
        $this->menu_sub_selected = 'update';

        $model = Document::model()->findByPk($id);

//        $imgConf = Yii::app()->params->product;

        if (isset($_POST['Document'])) {
//            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Document');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes = $post;

//            $model->created = $model->created ? $model->created : MyDateTime::getCurrentTime();
//            $model->update = MyDateTime::getCurrentTime();
            $model->manager_id = $model->manager_id ? $model->manager_id : $this->manager->id;
            if ($model->validate()) {
//                Yii::import('ext.TextParser');
//                $model->alias = $model->alias ? $model->alias : $model->name;
//                $model->alias = TextParser::toSEOString($model->alias);
                $model->setIsNewRecord(FALSE);

                if(isset($_FILES['video_file']['tmp_name']) && filesize($_FILES['video_file']['tmp_name'])>0){
                    //////////// VIDEO //////////
                    $uploaddir = 'upload/document/'.$model->id.'/';
                    if (!file_exists($uploaddir))
                        mkdir($uploaddir, 0777, true);
                    $max_filesize = 10485760;
                    //you should specify the value you want to be maximum of video.

                    if(filesize($_FILES['video_file']['tmp_name']) > $max_filesize)
                        die('File quá lớn.');

                    $file = basename($_FILES['video_file']['name']);
                    $uploadfile = $uploaddir . $file;

                    if (move_uploaded_file($_FILES['video_file']['tmp_name'], $uploadfile)) {
                        $model->link = $file;
                    }
                    else {
                        echo "ERROR";
                    }
                }

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was updated successful!");

                $this->refresh();
            }
        }

        $this->render('_form', array(
            'model' => $model
        ));
    }

    /**
     * delete a particular model.
     * If delete is successful, the browser will be reloaded page.
     * @param integer $id the ID of the model to be delete
     */
    public function actionDelete($id) {
        $product = Document::model()->findByPk($id);
//        $product->status = 'DISABLE';
        $product->delete();

        //TODO delete file in disk

        echo "Xóa sanr phẩm {$product->name} thành công";

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Document::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}