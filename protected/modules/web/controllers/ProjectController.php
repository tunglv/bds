<?php

class ProjectController extends WebController {

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
                'actions' => array('error', 'list', 'detail', 'group'),
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

    public function actionGroup(){
        $this->layout = '//layouts/main';

        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 5;
        $project = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 1);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_1 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 2);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_2 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 3);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_3 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 4);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_4 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 5);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_5 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 6);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_6 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 7);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_7 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 8);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_8 = Project::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 9);
        $criteria->order = 't.created DESC';
        $criteria->limit = 4;
        $project_9 = Project::model()->findAll($criteria);
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('group', array(
            'project'=>$project,
            'project_1'=>$project_1,
            'project_2'=>$project_2,
            'project_3'=>$project_3,
            'project_4'=>$project_4,
            'project_5'=>$project_5,
            'project_6'=>$project_6,
            'project_7'=>$project_7,
            'project_8'=>$project_8,
            'project_9'=>$project_9
        ));
    }
    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page home of site
     */
    public function actionList($type = 0) {
        $this->layout = '//layouts/main';

//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list');
    }

    public function actionDetail($id = 0){
        $this->layout = '//layouts/main';

//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('detail');
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
}
