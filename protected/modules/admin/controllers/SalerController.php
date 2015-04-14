<?php

class SalerController extends AdminController {

    public function init() {
        parent::init();
        $this->layout = '//admin/saler/_layout';
        $this->menu_parent_selected = 'saler';
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
                'actions' => array('create', 'index', 'update', 'delete'),
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
        $this->menu_child_selected = 'saler';
        $this->menu_sub_selected = 'index';

        $model = new Saler();
        $model->unsetAttributes();  // clear any default values

        $criteria = new CDbCriteria;
//            $criteria->order = 't.id ASC';
//        $criteria->with = array(
//            'manager' => array(
//                'select' => 'name'
//            ),
//        );

        if ($productFilter = Yii::app()->request->getQuery('Saler')) {
            $model->attributes = $productFilter;
            if (isset($productFilter['name']) && $productFilter['name'])
                $criteria->compare('t.name', $productFilter['name']);
//            if (isset($productFilter['id']) && $productFilter['id'])
//                $criteria->compare('t.id', $productFilter['id']);
//            if (isset($productFilter['type']) && $productFilter['type'])
//                $criteria->compare('t.type', $productFilter['type']);
//            if (isset($productFilter['topic_id']) && $productFilter['topic_id'])
//                $criteria->compare('t.topic_id', $productFilter['topic_id']);
        }


        $dataProvider = new CActiveDataProvider('Saler', array(
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
        $this->menu_child_selected = 'saler_create';
        $this->menu_sub_selected = 'create';

        $model = new Saler();

        $imgConf = Yii::app()->params->saler;

        if (isset($_POST['Saler'])) {
            $post = Yii::app()->request->getPost('Saler');
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

                $model->image = '200';
                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->name} was added successful!");
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
        $this->menu_child_selected = 'saler_update';
        $this->menu_sub_selected = 'update';

        $model = Saler::model()->findByPk($id);

        $imgConf = Yii::app()->params->saler;

        if (isset($_POST['Saler'])) {
            $post = Yii::app()->request->getPost('Saler');
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

                    $model->image = '200';
                }

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->name} was updated successful!");

                $this->refresh();
            }
        }

        $this->render('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete($id) {
        $product = Saler::model()->findByPk($id);
        $product->delete();

        //TODO delete file in disk

        echo "Xóa tin tức {$product->name} thành công";

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
        $model = Saler::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}