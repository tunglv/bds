<?php

class SaleController extends WebController {

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
                'actions' => array('error', 'list', 'detail'),
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
     * @param
     * @return page home of site
     */
    public function actionList($typeOf = '') {
        $type1 = 0;
        switch($typeOf){
            case 'ban-chung-cu':
                $type1 = 1;
                break;
            case 'ban-nha-rieng':
                $type1 = 2;
                break;
            case 'ban-khu-lien-ke':
                $type1 = 3;
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

        $dataProvider = new CActiveDataProvider('BdsSale', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array('dataProvider'=>$dataProvider));
    }

    public function actionDetail($alias = '', $id = 0){
        $this->layout = '//layouts/main';

        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $sale = BdsSale::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();
        $sameSale = $this->_getSameProject($sale->project_id, $sale->type);

        $this->render('detail', array('sale'=>$sale, 'same' => $sameSale));
    }

    private function _getSameProject($project_id = 0, $type = 0){
        $criteria = new CDbCriteria();
        $criteria->compare('t.project_id', $project_id);
        $criteria->compare('t.type', $type);
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;

        $product = BdsSale::model()->findAll($criteria);

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
