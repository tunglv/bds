<?php

class SalerController extends WebController {

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
                'actions' => array('error', 'list', 'detail', 'result'),
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

    public function actionResult(){
        $type = Yii::app()->request->getPost('choise-type');
        $typeLabel = Yii::app()->request->getPost('type-label');
        $provincce = Yii::app()->request->getPost('choise-city');
        $provincceLabel = Yii::app()->request->getPost('city-label');
        $district = Yii::app()->request->getPost('choise-district');
        $districtLabel = Yii::app()->request->getPost('district-label');
        $ward = Yii::app()->request->getPost('choise-ward');
        $wardLabel = Yii::app()->request->getPost('ward-label');

        $label = $typeLabel ? $typeLabel : 'Tổng hợp';
        $label .= ($wardLabel ? ' - '.$wardLabel : '').($districtLabel ? ' - '.$districtLabel : '').($provincceLabel ? ' - '.$provincceLabel:'');

        $this->layout = '//layouts/main';
//        $product_viewed = $this->_getCookieViewedProduct();

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', $type);
        if($provincce) {
            $criteria->compare('t.province_id', $provincce);
        }
        if($district) {
            $criteria->compare('t.district_id', $district);
        }
        if($ward) {
            $criteria->compare('t.ward_id', $ward);

        }
        $criteria->compare('t.type', $type);
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('Project', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $hot_topic = $this->_getHotTopic();
        $hot_project = $this->_getHotProject();
        $group_province = $this->_getGroupProject('province_name', 'province_id', 'province_id', $type);
        $group_type = $this->_getGroupProject('type', '', 'type');
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array(
            'dataProvider'=>$dataProvider,
            'label' => $label,
            'type' => $type,
            'hot_topic' => $hot_topic,
            'hot_project'=>$hot_project,
            'group_province'=>$group_province,
            'group_type'=>$group_type
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

        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('Saler', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list',array('dataProvider'=>$dataProvider));
    }

    public function actionDetail($id = 0, $alias = ''){
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');
        $this->layout = '//layouts/main';

        $saler = Saler::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('detail', array('saler'=>$saler));
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
