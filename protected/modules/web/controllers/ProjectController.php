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
                'actions' => array('error', 'list', 'listC', 'detail', 'group', 'result'),
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
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array(
            'dataProvider'=>$dataProvider,
            'label' => $label,
            'hot_topic' => $hot_topic,
            'hot_project'=>$hot_project,
            'group_province'=>$group_province
        ));
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

        $hot_news = $this->_getViewedNews();
        $hot_topic = $this->_getHotTopic();
        $hot_project = $this->_getHotProject();

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
            'project_9'=>$project_9,
            'hot_news'=>$hot_news,
            'hot_topic'=>$hot_topic,
            'hot_project'=>$hot_project
        ));
    }
    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page home of site
     */
    public function actionListC($alias = '', $city = '', $cid = 0) {
        /*
         * '1' => 'cao-oc-van-phong',
            '2' => 'khu-can-ho',
            '3' => 'khu-do-thi-moi',
            '4' => 'khu-thuong-mai-dich-vu',
            '5' => 'khu-phuc-hop',
            '6' => 'khu-dan-cu',
            '7' => 'khu-du-lich-nghi-duong',
            '8' => 'khu-cong-nghiep',
            '9' => 'du-an-khac'
         */
        $infor = $this->_getType($alias);

        $this->layout = '//layouts/main';
        if(!$infor['type']) throw new CHttpException(404, 'The requested page does not exist.');
//        $product_viewed = $this->_getCookieViewedProduct();

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', $infor['type']);
        if($cid) $criteria->compare('t.province_id', $cid);
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
        $group_province = $this->_getGroupProject('province_name', 'province_id', 'province_id', $infor['type']);
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array(
            'dataProvider'=>$dataProvider,
            'label'=>$infor['label'],
            'hot_topic' => $hot_topic,
            'hot_project'=>$hot_project,
            'group_province'=>$group_province
        ));
    }

    public function actionList($alias = '') {
        /*
         * '1' => 'cao-oc-van-phong',
            '2' => 'khu-can-ho',
            '3' => 'khu-do-thi-moi',
            '4' => 'khu-thuong-mai-dich-vu',
            '5' => 'khu-phuc-hop',
            '6' => 'khu-dan-cu',
            '7' => 'khu-du-lich-nghi-duong',
            '8' => 'khu-cong-nghiep',
            '9' => 'du-an-khac'
         */
        $infor = $this->_getType($alias);

        $this->layout = '//layouts/main';
        if(!$infor['type']) throw new CHttpException(404, 'The requested page does not exist.');
//        $product_viewed = $this->_getCookieViewedProduct();

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', $infor['type']);
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
        $group_province = $this->_getGroupProject('province_name', 'province_id', 'province_id', $infor['type']);
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('list', array(
            'dataProvider'=>$dataProvider,
            'label'=>$infor['label'],
            'hot_topic' => $hot_topic,
            'hot_project'=>$hot_project,
            'group_province'=>$group_province
        ));
    }


    public function actionDetail($type='', $alias ='', $id = 0){
        $this->layout = '//layouts/main';
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $project = Project::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('detail', array('project'=>$project));
    }

    private function _getType($alias = ''){
        $type = 0;$label = '';
        switch($alias){
            case 'cao-oc-van-phong':
                $type = 1;
                $label = 'Cao ốc văn phòng';
                break;
            case 'khu-can-ho':
                $type = 2;
                $label = 'Khu căn hộ';
                break;
            case 'khu-do-thi-moi':
                $type = 3;
                $label = 'Khu đô thị mới';
                break;
            case 'khu-thuong-mai-dich-vu':
                $type = 4;
                $label = 'Khu thương mại - dịch vụ';
                break;
            case 'khu-phuc-hop':
                $type = 5;
                $label = 'Khu phức hợp';
                break;
            case 'khu-dan-cu':
                $type = 6;
                $label = 'Khu dân cư';
                break;
            case 'khu-du-lich-nghi-duong':
                $type = 7;
                $label = 'Khu du lịch - nghỉ dưỡng';
                break;
            case 'khu-cong-nghiep':
                $type = 8;
                $label = 'Khu công nghiệp';
                break;
            case 'du-an-khac':
                $type = 9;
                $label = 'Dự án khác';
                break;
        }

        $data = array(
            'type' => $type,
            'label' => $label
        );

        return $data;
    }

    private function _getViewedNews(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.viewed DESC';
        $criteria->limit = 6;

        $product = News::model()->findAll($criteria);

        return $product;
    }

    private function _getHotTopic(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.viewed DESC';
        $criteria->limit = 10;

        $topic = TopicNews::model()->findAll($criteria);

        return $topic;
    }

    private function _getGroupProject($name_field = '', $name_field_1 = '', $field_group = '', $type = ''){
        $criteria = new CDbCriteria();
        if($name_field_1) {
            $criteria->select = '`' . $name_field . '`,`' . $name_field_1 . '`, `type`, count(*) AS `viewed`';
        }else{
            $criteria->select = '`' . $name_field . '`,count(*) AS `viewed`';
        }
        $criteria->group = '`'.$field_group.'`';
        if($type) $criteria->compare('`type`',$type);
        $data = Project::model()->findAll($criteria);

        return $data;
    }

    private function _getHotProject(){
        //        newest project
        $criteria = new CDbCriteria();
        $criteria->order = 't.viewed DESC';
        $criteria->limit = 10;
        $project = Project::model()->findAll($criteria);

        return $project;
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
