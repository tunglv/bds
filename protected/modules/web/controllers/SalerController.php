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
                'actions' => array('error', 'list', 'detail', 'result', 'city'),
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

    public function actionResult($cityLabel = '', $cityid = '', $distLabel = '', $distid = '', $projectLabel = '', $projectid = ''){
//        $provincce = Yii::app()->request->getPost('choise-city');
//        $provincceLabel = Yii::app()->request->getPost('city-label');
//        $district = Yii::app()->request->getPost('choise-district');
//        $districtLabel = Yii::app()->request->getPost('district-label');
//        $project = Yii::app()->request->getPost('choise_ward');
//        $projectLabel = Yii::app()->request->getPost('ward-label');

        $label = ($projectLabel ? $projectLabel : '').($distLabel ? ' - '.$distLabel : '').($cityLabel ? ' - '.$cityLabel:'');

        $this->layout = '//layouts/main';
//        $product_viewed = $this->_getCookieViewedProduct();
        $this->page = "/nha-mo-gioi";
        $this->title = 'Danh sách các nhà mô giới bất động sản';
        $this->desc = 'Danh sách các nhà mô giới bất động sản';

        if(!$cityid){
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        $criteria = new CDbCriteria();

        if($projectid) {
            $criteria->with = array('project' =>array(
                'select'=>false,
                // but want to get only users with published posts
                'joinType'=>'INNER JOIN',
                'condition'=>'project.id='.$projectid,
                'together' => TRUE
            ));
        }else if($distid) {
            $criteria->compare('t.district_id', $distid);
        }else if($cityid) {
            $criteria->compare('t.province_id', $cityid);
        }

        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('Saler', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

//        $hot_topic = $this->_getHotTopic();
//        $hot_project = $this->_getHotProject();
//        $group_province = $this->_getGroupProject('province_name', 'province_id', 'province_id', $type);
//        $group_type = $this->_getGroupProject('type', '', 'type');
//        $product_viewed = $this->_getCookieViewedProduct();
        $ramdomSaler = $this->_getRamdonSaler();
        $groupSaler = $this->_getGroupSaler();

        $this->render('list', array(
            'dataProvider'=>$dataProvider,
            'saler' => $ramdomSaler,
            'group' => $groupSaler
//            'label' => $label,
//            'type' => $type,
//            'hot_topic' => $hot_topic,
//            'hot_project'=>$hot_project,
//            'group_province'=>$group_province,
//            'group_type'=>$group_type
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
        $this->page = "/nha-mo-gioi";
        $this->title = 'Danh sách các nhà mô giới bất động sản';
        $this->desc = 'Danh sách các nhà mô giới bất động sản';

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

        $ramdomSaler = $this->_getRamdonSaler();
        $groupSaler = $this->_getGroupSaler();

        $this->render('list',array('dataProvider'=>$dataProvider, 'saler' => $ramdomSaler, 'group'=>$groupSaler));
    }

    public function actionCity($alias = null, $id = null){
        $this->layout = '//layouts/main';
        $this->page = "/nha-mo-gioi-{$alias}-{$id}";
        $this->title = 'Danh sách các nhà mô giới bất động sản ở '.$alias;
        $this->desc = 'Danh sách các nhà mô giới bất động sản ở '.$alias;

        $criteria = new CDbCriteria();
        $criteria->compare('t.province_id', $id);
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

        $ramdomSaler = $this->_getRamdonSaler();
        $groupSaler = $this->_getGroupSaler();

        $this->render('list',array('dataProvider'=>$dataProvider, 'saler' => $ramdomSaler, 'group'=>$groupSaler));
    }

    public function actionDetail($id = 0, $alias = ''){
        $this->layout = '//layouts/main';
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $this->page = "/nha-mo-gioi/{$alias}-{$id}";

        $saler = Saler::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();
        $this->title = 'Nhà mô giới '.$saler->name;
        $this->desc =  'Tìm hiểu nhà mô giới '.$saler->name;

        $ramdomSaler = $this->_getRamdonSaler();
        $groupSaler = $this->_getGroupSaler();

        $this->render('detail', array('saler'=>$saler, 'rSaler' => $ramdomSaler, 'group'=>$groupSaler));
    }

    private function _getGroupSaler(){
        $criteria = new CDbCriteria();
        $criteria->select = '`province_name`, `province_id`, count(*) AS `created`';
        $criteria->group = '`province_id`';
        $data = Saler::model()->findAll($criteria);

        return $data;
    }

    private function _getRamdonSaler(){
        $maxOffest = Saler::model()->count() < 10 ? 0 : Saler::model()->count() - 10;
        $offset = rand ( 0, $maxOffest);
        //        newest project
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;
        $criteria->offset = $offset;
        $saler = Saler::model()->findAll($criteria);

        return $saler;
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
