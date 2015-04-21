<?php

class RentController extends AdminController {

    public function init() {
        parent::init();
        $this->layout = '//admin/rent/_layout';
        $this->menu_parent_selected = 'rent';
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
                'actions' => array('create', 'index', 'update', 'delete','uploadImages'),
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
        $this->menu_child_selected = 'rent';
        $this->menu_sub_selected = 'index';

        $model = new BdsRent();
        $model->unsetAttributes();  // clear any default values

        $criteria = new CDbCriteria;
//            $criteria->order = 't.id ASC';

        if ($productFilter = Yii::app()->request->getQuery('BdsRent')) {
            $model->attributes = $productFilter;
            if (isset($productFilter['name']) && $productFilter['name'])
                $criteria->compare('t.name', $productFilter['name']);
            if (isset($productFilter['id']) && $productFilter['id'])
                $criteria->compare('t.id', $productFilter['id']);
            if (isset($productFilter['status']) && $productFilter['status'])
                $criteria->compare('t.status', $productFilter['status']);
            if (isset($productFilter['manager_id']) && $productFilter['manager_id'])
                $criteria->compare('t.manager_id', $productFilter['manager_id']);
            if (isset($productFilter['catagory']) && $productFilter['catagory'])
                $criteria->compare('t.catagory', $productFilter['catagory']);
        }


        $dataProvider = new CActiveDataProvider('BdsRent', array(
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
        $this->menu_child_selected = 'rent_create';
        $this->menu_sub_selected = 'create';

        $model = new BdsRent();

        $imgConf = Yii::app()->params->rent;

        if (isset($_POST['BdsRent'])) {
            $post = Yii::app()->request->getPost('BdsRent');
            $model->attributes = $post;
            $model->created = time();
            Yii::import('ext.TextParser');
            $model->alias = $model->alias ? $model->alias : $model->name;
            $model->alias = TextParser::toSEOString($model->alias);
            $model->code = $model->getNewSyntax();
            $model->price = str_replace('.','', $model->price);
            $model->area = str_replace('.','', $model->area);

//            var_dump($model->validate());
//            var_dump($model->getErrors());die;

            if ($model->validate()) {
                $model->setIsNewRecord(TRUE);
                $model->insert();

                if(!$coverImg = Yii::app()->request->getPost('is_cover')){
                    foreach(Yii::app()->session['productImgTemp'] as $imgPath){
                        if(!file_exists($imgPath)) continue;
                        $imgInfo = pathinfo($imgPath);
//                        if(!empty($imgEnableData) && in_array($imgInfo['filename'], array_keys($imgEnableData)))
//                        {
                        $coverImg = $imgInfo['basename'];
                        break;
//                        }
                    }
                }
                list($coverImgName) = explode('.', $coverImg);
                $model->image = $coverImgName;

                // upload images
                $basePath = $imgConf['path'];
                if(Yii::app()->session['productImgTemp']){
                    foreach(Yii::app()->session['productImgTemp'] as $imgPath){
                        if(!file_exists($imgPath)) continue;
                        // upload image type
                        $imgInfo = pathinfo($imgPath);

                        $savedPath = $basePath.'/'.$model->id.'/';
                        //tạo thumb
                        $fileName = ImagesRent::model()->createThumb($imgPath, $savedPath,$imgConf);

//                        unlink($imgPath);
                        //insert vào bảng branch
                        $branchImage = new ImagesRent();
                        $branchImage->bds_rent_id = $model->id;
                        $branchImage->image = $fileName;
                        $branchImage->is_cover = $imgInfo['basename'] == $coverImg ? 1 : 0;
                        $branchImage->insert();

                    }
                    unset(Yii::app()->session['productImgTemp']);
                }

//                if(isset($post['catagory']) && $post['catagory']){
//                    foreach($post['catagory'] as $catagory){
//                        $productCatagory = new ProductCatagory();
//                        $productCatagory->product_id = $model->id;
//                        $productCatagory->catagory_id = $catagory;
//                        $productCatagory->insert();
//                    }
//                }

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
        $this->menu_child_selected = 'rent_update';
        $this->menu_sub_selected = 'update';

        $model = BdsRent::model()->findByPk($id);

        $imgConf = Yii::app()->params->rent;

        if (isset($_POST['BdsRent'])) {
            $post = Yii::app()->request->getPost('BdsRent');
            //             echo "<pre>";print_r($post);echo "</pre>";die;
            $model->attributes = $post;

            $model->price = str_replace('.','', $model->price);
            $model->area = str_replace('.','', $model->area);

            $model->created = $model->created ? $model->created : time();
            if ($model->validate()) {
                Yii::import('ext.TextParser');
                $model->alias = $model->alias ? $model->alias : $model->name;
                $model->alias = TextParser::toSEOString($model->alias);
                $model->setIsNewRecord(FALSE);

                // detect image cover
                if(!$coverImg = Yii::app()->request->getPost('is_cover')){
                    $branchImage  = ImagesRent::model()->findByAttributes(array('bds_rent_id' => $model->id));
                    if($branchImage)
                        $coverImg = $branchImage->image.'.jpg';
                }
                list($coverImgName) = explode('.', $coverImg);
                $model->image = $coverImgName;

                ImagesRent::model()->updateAll(array('is_cover' => 0), "bds_rent_id = {$model->id}");
                ImagesRent::model()->updateAll(array('is_cover' => 1), "bds_rent_id = {$model->id} AND image = '{$coverImgName}'");

                $model->update();

                Yii::app()->user->setFlash('success', "Post {$model->title} was updated successful!");

                $this->refresh();
            }
        }

        $this->render('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete($id) {
        $product = BdsRent::model()->findByPk($id);
        $product->status = 'DISABLE';
        $product->update();

        //TODO delete file in disk

        echo "Xóa sanr phẩm {$product->title} thành công";

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function actionUploadImages(){
        switch ($_SERVER['REQUEST_METHOD']) {
            //            case 'OPTIONS':
            //            case 'HEAD':
            //                $this->head();
            //                break;
            case 'GET':
                $this->_uploadGetImages();
                break;
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $this->_uploadPostImages();
                break;
            case 'DELETE':
                $this->_uploadDeleteImages();
                break;
            default:
                $this->header('HTTP/1.1 405 Method Not Allowed');
        }
    }
    private function _uploadGetImages() {
        $id = Yii::app()->request->getQuery('id');
        if($id){
            $images = ImagesRent::model()->findAllByAttributes(array('bds_rent_id' => $id));
            $data = array();
            $name_cookie = '';
            foreach($images as $img){
                if($img->is_cover){
                    $name_cookie =  $img->image;
                }
                $data['files'][] = array(
                    'id' => $img->image,
                    'name' => $img->image.'.jpg',
                    'url' => $img->url,
                    'thumbnail_url' => $img->getUrl('122'),
                    'delete_url' => $this->createAbsoluteUrl("/admin/rent/uploadImages", array('id' => $id, 'product_image_id'=>$img->id)),
                    'delete_type' => 'DELETE',
                );
            }
            Yii::app()->request->cookies['product_form_img_cover'] = new CHttpCookie('product_form_img_cover', $name_cookie.'.jpg', array('path' => '/admin/rent/'));

        }else{
            $productImgTemp = Yii::app()->session['productImgTemp'];
            $productImgTempExist = array();
            $data = array();
            if($productImgTemp){
                foreach($productImgTemp as $path){
                    if(file_exists($path)){
                        $productImgTempExist[] = $path;

                        $img = getimagesize($path);
                        $info = pathinfo($path);

                        $fileData = array(
                            'id' => $info['filename'],
                            'name' => $info['basename'],
                            'size' => filesize($path),
                            'type' => $img['mime'],
                            'url' => $this->baseUrl.'/'.$path,
                            'thumbnail_url' => $this->createAbsoluteUrl("/common/shopImageThumb", array('path' => $path)),
                            'delete_url' => $this->createAbsoluteUrl("/admin/rent/uploadImages", array('path' => $path, 'id' => $id)),
                            'delete_type' => 'DELETE',
                        );
                        $data['files'][] = $fileData;
                    }
                }
            }

            Yii::app()->session['productImgTemp'] = $productImgTempExist;
        }
        echo json_encode($data);
    }

    private function _uploadPostImages() {
        $maxUpload = (int)(ini_get('upload_max_filesize')); // Mb
        $maxFileSize = 5; // Mb
        $maxFileSize = ($maxUpload < $maxFileSize) ? $maxUpload : $maxFileSize;
        // Check the upload
        if (!isset($_FILES["files"]) || !$_FILES["files"]["size"][0] || $_FILES["files"]["size"][0] > $maxFileSize * 1024000){
            if(isset($_FILES['browse_file']) && $_FILES["browse_file"]["size"][0]){
                $_FILES['files'] = array();
                $_FILES['files'] = $_FILES['browse_file'];
            }
            $data = array(
                'files' => array(
                    array(
                        'name' => $_FILES["files"]["name"][0],
                        'size' => $_FILES["files"]["size"][0],
                        'type' => $_FILES["files"]["type"][0],
                        'error' => "Lỗi. Chỉ hỗ trợ dạng: png, gif, jpg, bmp và dưới {$maxFileSize}Mb",
                    )
                )
            );
            echo json_encode($data);
            die;
        }

        // check file type
        if(!in_array($_FILES["files"]["type"][0], array(
            'image/gif',
            'image/jpeg',
            'image/png',
            'image/bmp',
        ))){
            $data = array(
                'files' => array(
                    array(
                        'name' => $_FILES["files"]["name"][0],
                        'size' => $_FILES["files"]["size"][0],
                        'type' => $_FILES["files"]["type"][0],
                        'error' => 'Chỉ hỗ trợ upload file: png, gif, jpg, bmp',
                    )
                )
            );
            echo json_encode($data);
            die;
        }


        // product update action
        $imgConf = Yii::app()->params->rent;
        $basePath = $imgConf['path'];
        // $imgConf = $imgConf['item'];
        $id = Yii::app()->request->getQuery('id');
        if($id){
//            $product = Branch::model()->with('shop')->findByPk($id);
            $fileName = uniqid();
            $savedPath = "{$basePath}/{$id}/";

            ImagesRent::model()->createThumb($_FILES["files"]["tmp_name"][0], $savedPath, $imgConf, $fileName);

            // insert to product_image
            $productImage = new ImagesRent();
            $productImage->bds_rent_id = $id;
            $productImage->image = $fileName;
            $productImage->insert();

            $data = array(
                'files' => array(
                    array(
                        'id' => $productImage->image,
                        'product_image_id' => $productImage->id,
                        'name' => $productImage->image.'.jpg',
                        'url' => $productImage->url,
                        'thumbnail_url' => $productImage->getUrl('122'),
                        'delete_url' => $this->createAbsoluteUrl("/admin/rent/uploadImages", array('id' => $id, 'product_image_id' => $productImage->id)),
                        'delete_type' => 'DELETE',
                    )
                )
            );

        }
        // product create action
        else{

            $tempPath = "{$imgConf['tempPath']}".Yii::app()->session->sessionID.'/';
            if(!file_exists($tempPath)) mkdir($tempPath, 0777, true);

            $ext = image_type_to_extension(exif_imagetype($_FILES["files"]["tmp_name"][0]));

            $fileId = uniqid();
            $fileName = $fileId.$ext;

            move_uploaded_file($_FILES["files"]["tmp_name"][0], $tempPath.$fileName);

            $data = array(
                'files' => array(
                    array(
                        'id' => $fileId,
                        'name' => $fileName,
                        'size' => $_FILES['files']["size"][0],
                        'type' => $_FILES['files']["type"][0],
                        'url' => $this->baseUrl.'/'.$tempPath.$fileName,
                        'thumbnail_url' => $this->createAbsoluteUrl("/common/shopImageThumb", array('path' => $tempPath.$fileName)),
                        'delete_url' => $this->createAbsoluteUrl("/admin/rent/uploadImages", array('path' => $tempPath.$fileName, 'id' => $id)),
                        'delete_type' => 'DELETE',
                    )
                )
            );
            // update session image
            $productImgTemp = Yii::app()->session['productImgTemp'];
            $productImgTemp = $productImgTemp ? array_merge($productImgTemp, array($tempPath.$fileName)) : array($tempPath.$fileName);
            Yii::app()->session['productImgTemp'] = $productImgTemp;
        }
        echo json_encode($data); die;
    }

    private function _uploadDeleteImages(){
        $path = Yii::app()->request->getQuery('path');
        $product_image_id = Yii::app()->request->getQuery('product_image_id');

        if($product_image_id){
            $img = ImagesRent::model()->findByPk($product_image_id);
            $img->delete();

        }else{
            // update session image
            $productImgTemp = Yii::app()->session['productImgTemp'];
            array_diff($productImgTemp, array($path));
            Yii::app()->session['productImgTemp'] = $productImgTemp;

            if(file_exists($path)){
                unlink($path);
            }
        }

        echo json_encode(array('success' => TRUE));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = BdsRent::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}