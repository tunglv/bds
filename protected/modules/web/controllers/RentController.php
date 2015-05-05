<?php

class RentController extends WebController {

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
                'actions' => array('error', 'list', 'detail', 'listC', 'result','listP'),
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

    public function actionResult($cityLabel = null,$cityid= null,$distLabel=null,$distid=null,$wardLabel=null,$wardid=null,$projectLabel=null,$projectid=null,$area = null,$price=null){
        $this->layout = '//layouts/main';

        $criteria = new CDbCriteria();
        if($cityid) $criteria->compare('t.province_id', $cityid);
        if($distid) $criteria->compare('t.district_id', $distid);
        if($wardid) $criteria->compare('t.ward_id', $wardid);
        if($projectid) $criteria->compare('t.project_id', $projectid);
//        if($area) $criteria->compare('t.project_id', $projectid);

        if($area){
            switch($area){
                case 1:
                    $criteria->addCondition('t.area <=30');
                    break;
                case 2:
                    $criteria->addCondition('t.area > 30');
                    $criteria->addCondition('t.area <= 50');
                    break;
                case 3:
                    $criteria->addCondition('t.area > 50');
                    $criteria->addCondition('t.area <= 80');
                    break;
                case 4:
                    $criteria->addCondition('t.area > 80');
                    $criteria->addCondition('t.area <= 100');
                    break;
                case 5:
                    $criteria->addCondition('t.area > 100');
                    $criteria->addCondition('t.area <= 150');
                    break;
                case 6:
                    $criteria->addCondition('t.area > 150');
                    $criteria->addCondition('t.area <= 200');
                    break;
                case 7:
                    $criteria->addCondition('t.area > 200');
                    $criteria->addCondition('t.area <= 250');
                    break;
                case 8:
                    $criteria->addCondition('t.area > 250');
                    $criteria->addCondition('t.area <= 300');
                    break;
                case 9:
                    $criteria->addCondition('t.area > 300');
                    $criteria->addCondition('t.area <= 500');
                    break;
                case 10:
                    $criteria->addCondition('t.area > 500');
                    break;
            }
        }

        if($price){
            switch($price){
                case 1:
                    $criteria->addCondition('t.price <= 1000000');
                    break;
                case 2:
                    $criteria->addCondition('t.price > 1000000');
                    $criteria->addCondition('t.price <= 3000000');
                    break;
                case 3:
                    $criteria->addCondition('t.price > 3000000');
                    $criteria->addCondition('t.price <= 5000000');
                    break;
                case 4:
                    $criteria->addCondition('t.price > 5000000');
                    $criteria->addCondition('t.price <= 10000000');
                    break;
                case 5:
                    $criteria->addCondition('t.price > 10000000');
                    $criteria->addCondition('t.price <= 40000000');
                    break;
                case 6:
                    $criteria->addCondition('t.price > 40000000');
                    $criteria->addCondition('t.price <= 70000000');
                    break;
                case 7:
                    $criteria->addCondition('t.price > 40000000');
                    $criteria->addCondition('t.price <= 100000000');
                    break;
                case 8:
                    $criteria->addCondition('t.price > 100000000');
                    break;
            }
        }

        if(Yii::app()->request->cookies['choise-type'] && $type = Yii::app()->request->cookies['choise-type']->value){
            switch ($type) {
                case 1:
                    $criteria->order = 't.id DESC';
                    break;
                case 2:
                    $criteria->order = 't.price ASC';
                    break;
                case 3:
                    $criteria->order = 't.price DESC';
                    break;
                case 4:
                    $criteria->order = 't.area ASC';
                    break;
                case 5:
                    $criteria->order = 't.area DESC';
                    break;
            }
        }else{
            $criteria->order = 't.id DESC';
        }

        $dataProvider = new CActiveDataProvider('BdsRent', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $group = $this->_getGroupSale('province_name', 'province_id','province_id');
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array('dataProvider'=>$dataProvider, 'group'=>$group));
    }

    public function actionListP($projectAlias = '', $projectId = ''){
        $this->layout = '//layouts/main';

        if(!$projectId) throw new CHttpException(404, 'The requested page does not exist.');

        $criteria = new CDbCriteria();
        $criteria->compare('t.project_id', $projectId);

        if(Yii::app()->request->cookies['choise-type'] && $type = Yii::app()->request->cookies['choise-type']->value){
            switch ($type) {
                case 1:
                    $criteria->order = 't.id DESC';
                    break;
                case 2:
                    $criteria->order = 't.price ASC';
                    break;
                case 3:
                    $criteria->order = 't.price DESC';
                    break;
                case 4:
                    $criteria->order = 't.area ASC';
                    break;
                case 5:
                    $criteria->order = 't.area DESC';
                    break;
            }
        }else{
            $criteria->order = 't.id DESC';
        }

        $dataProvider = new CActiveDataProvider('BdsRent', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $group = $this->_getGroupSale('province_name', 'province_id','province_id');
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array('dataProvider'=>$dataProvider, 'group'=>$group));
    }

    public function actionListC($cityAlias = '', $cityId = '') {
//        $cityid = 0;

        $this->layout = '//layouts/main';

        if(!$cityId) throw new CHttpException(404, 'The requested page does not exist.');

        $criteria = new CDbCriteria();
        $criteria->compare('t.province_id', $cityId);

        if(Yii::app()->request->cookies['choise-type'] && $type = Yii::app()->request->cookies['choise-type']->value){
            switch ($type) {
                case 1:
                    $criteria->order = 't.id DESC';
                    break;
                case 2:
                    $criteria->order = 't.price ASC';
                    break;
                case 3:
                    $criteria->order = 't.price DESC';
                    break;
                case 4:
                    $criteria->order = 't.area ASC';
                    break;
                case 5:
                    $criteria->order = 't.area DESC';
                    break;
            }
        }else{
            $criteria->order = 't.id DESC';
        }

        $dataProvider = new CActiveDataProvider('BdsRent', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $group = $this->_getGroupSale('province_name', 'province_id','province_id');
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array('dataProvider'=>$dataProvider, 'group'=>$group));
    }


    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page home of site
     */
    public function actionList($typeOf = '') {
        $type1 = 0;
        switch($typeOf){
            case 'cho-thue-can-ho-chung-cu':
                $type1 = 1;
                break;
            case 'cho-thue-nha-rieng':
                $type1 = 2;
                break;
            default:
                $type1 = 0;
        }

        $this->layout = '//layouts/main';

        $criteria = new CDbCriteria();
        if($type1) $criteria->compare('t.type', $type1);

        if(Yii::app()->request->cookies['choise-type'] && $type = Yii::app()->request->cookies['choise-type']->value){
            switch ($type) {
                case 1:
                    $criteria->order = 't.id DESC';
                    break;
                case 2:
                    $criteria->order = 't.price ASC';
                    break;
                case 3:
                    $criteria->order = 't.price DESC';
                    break;
                case 4:
                    $criteria->order = 't.area ASC';
                    break;
                case 5:
                    $criteria->order = 't.area DESC';
                    break;
            }
        }else{
            $criteria->order = 't.id DESC';
        }

        $dataProvider = new CActiveDataProvider('BdsRent', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));
//        $product_viewed = $this->_getCookieViewedProduct();
        $group = $this->_getGroupSale('province_name', 'province_id','province_id');

        $this->render('list', array('dataProvider'=>$dataProvider, 'group' => $group));
    }

    public function actionDetail($alias = '', $id = 0){
        $this->layout = '//layouts/main';

        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $sale = BdsRent::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();
        $sameSale = $this->_getSameProject($sale->project_id, $sale->type);
        $groupP = $this->_getGroupSale('project_name', 'project_id','district_id',$sale->district_id);
        $group = $this->_getGroupSale('province_name', 'province_id','province_id');

        $this->render('detail', array('sale'=>$sale, 'same' => $sameSale, 'group_p' => $groupP, 'group' => $group));
    }

    private function _getGroupSale($name_field = '', $name_field_1 = '', $field_group = '', $type = ''){
        $criteria = new CDbCriteria();
        if($name_field_1) {
            $criteria->select = '`' . $name_field . '`,`' . $name_field_1 . '`, `type`, count(*) AS `created`';
        }else{
            $criteria->select = '`' . $name_field . '`,count(*) AS `created`';
        }
        $criteria->group = '`'.$field_group.'`';
        if($type) $criteria->compare('`district_id`',$type);
        $data = BdsRent::model()->findAll($criteria);

        return $data;
    }

    private function _getSameProject($project_id = 0, $type = 0){
        $criteria = new CDbCriteria();
        $criteria->compare('t.project_id', $project_id);
        $criteria->compare('t.type', $type);
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;

        $product = BdsRent::model()->findAll($criteria);

//        $result = array();
//
//        foreach ($product as $value) {
//            if($value->id != $sale_id) $result[] = $value;
//            else continue;
//        }

        return $product;
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
