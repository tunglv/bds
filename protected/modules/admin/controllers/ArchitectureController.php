<?php

class ArchitectureController extends AdminController {

    public function init() {
        parent::init();
        $this->layout = '//admin/architecture/_layout';
        $this->menu_parent_selected = 'architecture';
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
                'actions' => array('create', 'index', 'update', 'delete', 'createTopic', 'indexTopic', 'updateTopic'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Index of page handbook
     * list of handbook
     */
    public function actionIndex() {
        $this->menu_child_selected = 'architecture';
        $this->menu_sub_selected = 'index';

        $model = new Architecture();
        $model->unsetAttributes();  // clear any default values

        $criteria = new CDbCriteria;
//            $criteria->order = 't.id ASC';
//        $criteria->with = array(
//            'manager' => array(
//                'select' => 'name'
//            ),
//        );

        if ($productFilter = Yii::app()->request->getQuery('Architecture')) {
            $model->attributes = $productFilter;
            if (isset($productFilter['title']) && $productFilter['title'])
                $criteria->compare('t.title', $productFilter['title']);
            if (isset($productFilter['id']) && $productFilter['id'])
                $criteria->compare('t.id', $productFilter['id']);
            if (isset($productFilter['type']) && $productFilter['type'])
                $criteria->compare('t.type', $productFilter['type']);
            if (isset($productFilter['topic_id']) && $productFilter['topic_id'])
                $criteria->compare('t.topic_id', $productFilter['topic_id']);
        }


        $dataProvider = new CActiveDataProvider('Architecture', array(
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

    public function actionIndexTopic(){
        $this->menu_child_selected = 'architectureTopic';
        $this->menu_sub_selected = 'architectureTopic';

        $model = new TopicArchitecture();
        $model->unsetAttributes();  // clear any default values

        $criteria = new CDbCriteria;
//            $criteria->order = 't.id ASC';
//        $criteria->with = array(
//            'manager' => array(
//                'select' => 'name'
//            ),
//        );

        if ($productFilter = Yii::app()->request->getQuery('TopicArchitecture')) {
            $model->attributes = $productFilter;
            if (isset($productFilter['title']) && $productFilter['title'])
                $criteria->compare('t.title', $productFilter['title']);
        }


        $dataProvider = new CActiveDataProvider('TopicArchitecture', array(
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
        $this->render('index_topic', array('model' => $model, 'dataProvider' => $dataProvider));
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->menu_child_selected = 'architecture_create';
        $this->menu_sub_selected = 'create';

        $model = new Architecture();

        $imgConf = Yii::app()->params->architecture;

        if (isset($_POST['Architecture'])) {
            $post = Yii::app()->request->getPost('Architecture');
            $model->attributes = $post;
            $model->image = 'default';
            $model->created = time();
            Yii::import('ext.TextParser');
            $model->alias = $model->alias ? $model->alias : $model->title;
            $model->alias = TextParser::toSEOString($model->alias);

//            var_dump($model->validate());
//            var_dump($model->getErrors());die;

            if ($model->validate()) {
                $model->setIsNewRecord(TRUE);
                $model->insert();

                /////// IMAGES ////////
                $path = $imgConf['path'] . "{$model->id}/";
                if (!file_exists($path))
                    mkdir($path, 0777, true);

                $source = NULL;
                if ($post['upload_method'] == 'file') {
                    $source = 'browse_file';
                } else {
                    $source = $post['image_url'];
                }

                Yii::import('ext.wideimage.lib.WideImage');
                $img = WideImage::load($source);

                foreach ($imgConf['img'] as $key => $imgInfo) {
                    $img = $img->resize($imgInfo['width'], $imgInfo['height'], 'outside', 'down');
                    $img = $img->resizeCanvas($imgInfo['width'], $imgInfo['height'], 'center', 'center', null, 'down');
                    $img->saveToFile($path . $key . '.jpg', $imgInfo['quality']);
                }

                $model->image = '260';
                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was added successful!");
                $this->refresh();
            }
        }

        $this->render('_form', array(
            'model' => $model
        ));
    }

    public function actionCreateTopic(){
        $this->menu_child_selected = 'architectureTopic_create';
        $this->menu_sub_selected = 'architectureTopic';

        $model = new TopicArchitecture();
        $imgConf = Yii::app()->params->topic_architecture;
        if (isset($_POST['TopicArchitecture'])) {
            $post = Yii::app()->request->getPost('TopicArchitecture');
            $model->attributes = $post;
            $model->created = time();
            Yii::import('ext.TextParser');
            $model->alias = $model->alias ? $model->alias : $model->title;
            $model->alias = TextParser::toSEOString($model->alias);

//            var_dump($model->validate());
//            var_dump($model->getErrors());die;

            if ($model->validate()) {
                $model->setIsNewRecord(TRUE);
                $model->insert();
                /////// IMAGES ////////
                $path = $imgConf['path'] . "{$model->id}/";
                if (!file_exists($path))
                    mkdir($path, 0777, true);

                $source = NULL;
                if ($post['upload_method'] == 'file') {
                    $source = 'browse_file';
                } else {
                    $source = $post['image_url'];
                }

                Yii::import('ext.wideimage.lib.WideImage');
                $img = WideImage::load($source);

                foreach ($imgConf['img'] as $key => $imgInfo) {
                    $img = $img->resize($imgInfo['width'], $imgInfo['height'], 'outside', 'down');
                    $img = $img->resizeCanvas($imgInfo['width'], $imgInfo['height'], 'center', 'center', null, 'down');
                    $img->saveToFile($path . $key . '.jpg', $imgInfo['quality']);
                }

                $model->image = '260';

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was added successful!");
                $this->refresh();
            }
        }

        $this->render('_form_topic', array(
            'model' => $model
        ));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->menu_child_selected = 'architecture_update';
        $this->menu_sub_selected = 'update';

        $model = Architecture::model()->findByPk($id);

        $imgConf = Yii::app()->params->architecture;

        if (isset($_POST['Architecture'])) {
            $post = Yii::app()->request->getPost('Architecture');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes = $post;

            if ($model->validate()) {
                Yii::import('ext.TextParser');
                $model->alias = $model->alias ? $model->alias : $model->title;
                $model->alias = TextParser::toSEOString($model->alias);
                $model->setIsNewRecord(FALSE);

                /////// IMAGES ////////
                $path = $imgConf['path'] . "{$model->id}/";
                if (!file_exists($path))
                    mkdir($path, 0777, true);

                if (
                    ($post['upload_method'] == 'file' && $_FILES['browse_file']['size']) ||
                    ($post['upload_method'] == 'url' && $post['image_url'])
                ) {
                    $source = NULL;
                    if ($post['upload_method'] == 'file') {
                        $source = 'browse_file';
                    } else {
                        $source = $post['image_url'];
                    }

                    Yii::import('ext.wideimage.lib.WideImage');
                    $img = WideImage::load($source);

                    foreach ($imgConf['img'] as $key => $imgInfo) {
                        $img = $img->resize($imgInfo['width'], $imgInfo['height'], 'outside', 'down');
                        $img = $img->resizeCanvas($imgInfo['width'], $imgInfo['height'], 'center', 'center', null, 'down');
                        $img->saveToFile($path . $key . '.jpg', $imgInfo['quality']);
                    }

                    $model->image = '260';
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

    public function actionUpdateTopic($id){
        $this->menu_child_selected = 'architectureTopic_update';
        $this->menu_sub_selected = 'updateTopic';

        $model = TopicArchitecture::model()->findByPk($id);
        $imgConf = Yii::app()->params->topic_architecture;
        if (isset($_POST['TopicArchitecture'])) {
            $post = Yii::app()->request->getPost('TopicArchitecture');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes = $post;
            Yii::import('ext.TextParser');
            $model->alias = $model->alias ? $model->alias : $model->title;
            $model->alias = TextParser::toSEOString($model->alias);

            if ($model->validate()) {
                $model->setIsNewRecord(FALSE);

                /////// IMAGES ////////
                $path = $imgConf['path'] . "{$model->id}/";
                if (!file_exists($path))
                    mkdir($path, 0777, true);

                if (
                    ($post['upload_method'] == 'file' && $_FILES['browse_file']['size']) ||
                    ($post['upload_method'] == 'url' && $post['image_url'])
                ) {
                    $source = NULL;
                    if ($post['upload_method'] == 'file') {
                        $source = 'browse_file';
                    } else {
                        $source = $post['image_url'];
                    }

                    Yii::import('ext.wideimage.lib.WideImage');
                    $img = WideImage::load($source);

                    foreach ($imgConf['img'] as $key => $imgInfo) {
                        $img = $img->resize($imgInfo['width'], $imgInfo['height'], 'outside', 'down');
                        $img = $img->resizeCanvas($imgInfo['width'], $imgInfo['height'], 'center', 'center', null, 'down');
                        $img->saveToFile($path . $key . '.jpg', $imgInfo['quality']);
                    }

                    $model->image = '260';
                }

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was updated successful!");

                $this->refresh();
            }
        }

        $this->render('_form_topic', array(
            'model' => $model
        ));
    }
    public function actionDeleteTopic($id){
        $product = TopicArchitecture::model()->findByPk($id);
        $product->delete();

        //TODO delete file in disk

        echo "Xóa chủ đề {$product->title} thành công";

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('indexTopic'));
    }

    public function actionDelete($id) {
        $product = Architecture::model()->findByPk($id);
        $product->delete();

        //TODO delete file in disk

        echo "Xóa tin tức {$product->title} thành công";

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
        $model = Architecture::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}