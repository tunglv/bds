<?php

class RegisteredController extends AdminController
{
    public function init(){
        parent::init();
        $this->layout = '//admin/registered/_layout';
        $this->menu_parent_selected = 'registered';

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
                'actions'=>array('index', 'delete', 'update'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    public function actionIndex() {
        $this->menu_child_selected = 'registered';
        $this->menu_sub_selected = 'index';

        $model = new Registered();
        $model->unsetAttributes();  // clear any default values

        $criteria = new CDbCriteria;
//            $criteria->order = 't.id ASC';
//        $criteria->with = array(
//            'manager' => array(
//                'select' => 'name'
//            ),
//        );

        if ($productFilter = Yii::app()->request->getQuery('Registered')) {
            $model->attributes = $productFilter;
            if (isset($productFilter['name']) && $productFilter['name'])
                $criteria->compare('t.name', $productFilter['name'], true);
            if (isset($productFilter['phone']) && $productFilter['phone'])
                $criteria->compare('t.phone', $productFilter['phone']);
            if (isset($productFilter['email']) && $productFilter['email'])
                $criteria->compare('t.email', $productFilter['email']);
            if (isset($productFilter['status']) && $productFilter['status'])
                $criteria->compare('t.status', $productFilter['status']);
        }


        $dataProvider = new CActiveDataProvider('Registered', array(
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
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $product = Registered::model()->findByPk($id);
        $product->status = 'enable';
        $product->update();

        echo "Duyệt đăng ký của {$product->name} thành công";

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function actionDelete($id) {
        $product = Registered::model()->findByPk($id);
        $product->status = 'disable';
        $product->update();

        echo "Xóa đăng ký của {$product->name} thành công";

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Registered::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}