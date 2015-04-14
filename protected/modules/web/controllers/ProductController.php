<?php

class ProductController extends WebController {

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('error', 'index', 'captcha', 'list', 'detail', 'create', 'update'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionError() {
        $this->layout = '//layouts/main';

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else {

                $view = 'error';
                if (in_array($error['code'], array(404))) {
                    $view .= $error['code'];
                }
                $this->render($view, $error);
            }
        }
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param $id, $alias of type meohay
     * @return page list meohay
     */
    public function actionList($alias = null) {
        $this->layout = '//layouts/main';
        $catagory = Catagory::model()->getCatagoryByAlias($alias);

        $criteria = new CDbCriteria();
        $criteria->compare('t.catagory', $catagory->id);
        $criteria->compare('t.status', 'ENABLE');
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('Product', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed_product = $this->_getCookieViewedProduct();

        $this->render('list', array('dataProvider'=>$dataProvider, 'viewed_product'=>$viewed_product, 'catagory'=>$catagory));
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param $id, $alias of meohay detail
     * @return page detail meohay
     */
    public function actionDetail($alias = null) {
        $this->layout = '//layouts/main';

            $product = Product::model()->getProductByAlias($alias);

        $this->title = $product['name'];
        $this->desc = $product['desc'];

        $same_product = $this->_getSameProduct($product['catagory'], $product['id']);
        $viewed_product = $this->_getCookieViewedProduct();

        $cookies_viewed_product = '';

        if(isset(Yii::app()->request->cookies['view_product'])){
            $cookies_viewed_product = Yii::app()->request->cookies['view_product']->value;

            if(strpos($cookies_viewed_product, $product['id']) === false){

                if(substr_count($cookies_viewed_product,',') == 4){
                    $cookies_viewed_product = substr($cookies_viewed_product,0,strrpos($cookies_viewed_product,','));
                }
                $cookies_viewed_product = $product['id'].','.$cookies_viewed_product;
            }
        } else {
            $cookies_viewed_product = $product['id'];
        }

        $cookies = new CHttpCookie('view_product', $cookies_viewed_product);
        $cookies->expire = time() + 24*60*60;

        Yii::app()->request->cookies['view_product'] = $cookies;

        $this->render('detail_product',array('product'=>$product, 'viewed_product'=>$viewed_product, 'same_product'=>$same_product));
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param $type of meohay
     * @return same meohay
     */
    public function _getSameProduct($catagory = null, $id = null) {
        $criteria = new CDbCriteria();
//        $criteria -> select='t.id';

        $criteria->compare('t.catagory', $catagory);
        $criteria->compare('t.status', 'ENABLE');
        $criteria->order = 't.created DESC';
        $criteria->limit = 5;

        $product = Product::model()->findAll($criteria);

        $result = array();

        foreach ($product as $value) {
            if($value->id != $id) $result[] = $value;
            else continue;
        }

        return $result;
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return array branches has viewd for 1 day ago
     */
    private function _getCookieViewedProduct() {
        if(empty(Yii::app()->request->cookies['view_product'])) return false;

        $viewed_product = Yii::app()->request->cookies['view_product']->value;

        $product_ids = explode(',', $viewed_product);

        foreach($product_ids as $index => $product_id){
            $product_id = intval($product_id);
            if(!$product_id || !is_int($product_id)) unset($product_ids[$index]);
        }

        $product= array();
        foreach($product_ids as $product_id){
            $product[] = Product::model()->getProductById($product_id);
        }
        return $product;
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page create meohay
     */
    public function actionCreate() {
        $this->layout = '//layouts/main';

        $model = new Meohay();

        $imgConf = Yii::app()->params->meohay;
        $tempPath = "upload/temp/meohay/" . Yii::app()->getSession()->sessionID . "/";
        if (!file_exists($tempPath))
            mkdir($tempPath, 0777, true);

        if (isset($_POST['Meohay'])) {
            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Meohay');
            $model->attributes = $post;
//            $model->user_id = $this->user->id;
            $model->user_id = 13;
            $model->status = 'PENDING';
            $model->image = 'default';
            $model->has_step = 1;
            $model->created = MyDateTime::getCurrentTime();
            Yii::import('ext.TextParser');
            $model->alias = $model->alias ? $model->alias : $model->title;
            $model->alias = TextParser::toSEOString($model->alias);
            if ($model->validate()) {
//                var_dump($model->validate());
//                var_dump($model->getErrors());
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

                $model->image = '300';

                $model->update();

                Myext::deleteDir("upload/temp/meohay/", FALSE);
                unset(Yii::app()->session['contentPath']);

                $this->redirect(array('/web/meohay/step', 'm_id' => $model->id, 'step' => 1));
                Yii::app()->user->setFlash('success', "Post {$model->title} was added successful!");
                $this->refresh();
            }
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page create meohay
     */
    public function actionStep($m_id = null, $step = null) {
        $this->layout = '//layouts/main';

        $model = new StepCreateContent('search');

        $imgConf = Yii::app()->params->meohay;

        if (isset($_POST['StepCreateContent'])) {
            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('StepCreateContent');
            $model->attributes = $post;
            $this->manager->id ? ($model->manager_id = $this->manager->id) : ($model->user_id = Yii::app()->user->id);
            $model->image = 'default';
            $model->step = $step;
            $model->meohay_id = $m_id;
            $model->created = MyDateTime::getCurrentTime();
            if ($model->validate()) {
//                var_dump($model->validate());
//                var_dump($model->getErrors());
                $model->setIsNewRecord(TRUE);
                $model->insert();

                /////// IMAGES ////////
                $path = $imgConf['path'] . "{$model->meohay_id}/step_{$model->id}/";
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

                    $model->image = '300';

                    $model->update();
                }

                Yii::app()->user->setFlash('success', "Post {$model->name} was added successful!");
                if ($_POST['cmd'] == 'Next')
                    $this->redirect(array('/web/meohay/step', 'm_id' => $m_id, 'step' => ($step + 1)));
                elseif ($_POST['cmd'] == 'End')
                    $this->redirect(array('/web/meohay/note', 'id' => $m_id));
            }
        }

        $this->render('create_step', array('model' => $model, 'step' => $step));
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param int $id of meohay
     * @return update column note, tip of that meohay
     */

    public function actionNote($id = null) {
        $model = Meohay::model()->findByPk($id);

        if (isset($_POST['Meohay'])) {
            $post = Yii::app()->request->getPost('Meohay');
            $model->attributes = $post;

            if ($model->validate()) {
                $model->setIsNewRecord(FALSE);

                $model->update();

                $this->redirect(array('/web/meohay/update', 'id' => $id));
            }

        }

        $this->render('create', array('model' => $model));
    }

    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return
     */
    public function actionUpdate($id = null) {
        $model = Meohay::model()->with('stepCreateContents')->findByPk($id);

        $imgConf = Yii::app()->params->meohay;
        $tempPath = $imgConf['path'] . "{$model->id}/";
        if (!file_exists($tempPath))
            mkdir($tempPath, 0777, true);

        if (isset($_POST['Meohay'])) {
            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('Meohay');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes = $post;

            $model->created = $model->created ? $model->created : MyDateTime::getCurrentTime();
            $model->changed = MyDateTime::getCurrentTime();
            $model->manager_id = $model->manager_id ? $model->manager_id : $this->manager->id;
            if ($model->validate()) {
                Yii::import('ext.TextParser');
                $model->alias = $model->alias ? $model->alias : $model->name;
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

                    $model->image = '300';
                }

                if (trim($model->content)) {
                    // upload content images
                    Yii::import('ext.Myext');
                    $model->content = Myext::saveContentImages($model->content, $path, array(
                        'image_x' => $imgConf['img']['body']['width'],
                        'image_y' => $imgConf['img']['body']['height'],
                    ));
                }

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was updated successful!");
                $this->refresh();
            }
        }
        $this->render('create', array('model'=>$model));
    }
    public function actionUpdateStep($id) {
        $model = StepCreateContent::model()->findByPk($id);

        $imgConf = Yii::app()->params->meohay;

        if (isset($_POST['StepCreateContent'])) {
            Yii::import('ext.MyDateTime');
            $post = Yii::app()->request->getPost('StepCreateContent');
            $model->changed = MyDateTime::getCurrentTime();
            if ($model->validate()) {
//                var_dump($model->validate());
//                var_dump($model->getErrors());
                $model->setIsNewRecord(FALSE);
                $model->update();

                /////// IMAGES ////////
                $path = $imgConf['path'] . "{$model->meohay_id}/step_{$model->id}/";
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

                    $model->image = '300';
                }

                $model->update();

                Yii::app()->user->setFlash('success', "Update {$model->name} was added successful!");
            }
        }
        $this->render('create_step', array('model' => $model));
    }
}
