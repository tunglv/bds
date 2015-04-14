<?php

class NewsController extends WebController {

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
                'actions' => array('error', 'list', 'detail', 'group', 'topic', 'listTopic'),
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
        $criteria->compare('t.type', 1);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_1 = News::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 2);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_2 = News::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 3);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_3 = News::model()->findAll($criteria);
//        $product_viewed = $this->_getCookieViewedProduct();

        $viewed = $this->_getViewedNews();
        $top_topic = $this->_getHotTopic();

        $this->render('group', array('news_1'=>$news_1, 'news_2'=>$news_2, 'news_3'=>$news_3, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }
    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page home of site
     */
    public function actionListTopic(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('TopicNews', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed = $this->_getViewedNews();
        $top_topic = $this->_getHotTopic();

        $this->render('list',array('dataProvider'=>$dataProvider, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }

    public function actionTopic($alias = null, $id = 0){
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $topic = TopicNews::model()->findByPk($id);

        $criteria = new CDbCriteria();
        $criteria->compare('t.topic_id', $id);
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('News', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed = $this->_getViewedNews();
        $top_topic = $this->_getHotTopic();

        $this->render('list',array('topic' => $topic, 'dataProvider'=>$dataProvider, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }
    public function actionList($alias = null) {
        $type = 0;
        switch($alias){
            case 'tin-tuc-thi-truong':
                $type = 1;
                break;
            case 'chinh-sach-quan-ly':
                $type = 2;
                break;
            case 'thong-tin-quy-hoach':
                $type = 3;
                break;
        }
        $this->layout = '//layouts/main';
        if(!$type) throw new CHttpException(404, 'The requested page does not exist.');
//        $product_viewed = $this->_getCookieViewedProduct();

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', $type);
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('News', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed = $this->_getViewedNews();
        $top_topic = $this->_getHotTopic();

        $this->render('list',array('dataProvider'=>$dataProvider, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }

    public function actionDetail($id = 0){
        $this->layout = '//layouts/main';
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $news = News::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();
        $same_news = $this->_getNewNews($id);
        $same_topic = $this->_getSameTopic($news->topic_id, $news->id);

        $viewed = $this->_getViewedNews();
        $top_topic = $this->_getHotTopic();

        $this->render('detail', array('news'=>$news, 'same'=>$same_news, 'topic'=>$same_topic, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }

    private function _getHotTopic(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;

        $topic = TopicNews::model()->findAll($criteria);

        return $topic;
    }

    private function _getSameTopic($topic_id = 0, $id = 0){
        $criteria = new CDbCriteria();
        $criteria->compare('t.topic_id', $topic_id);
        $criteria->order = 't.created DESC';
        $criteria->limit = 3;

        $product = News::model()->findAll($criteria);

        $result = array();

        foreach ($product as $value) {
            if($value->id != $id) $result[] = $value;
            else continue;
        }

        return $result;
    }

    private function _getNewNews($id = 0){
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 7;

        $product = News::model()->findAll($criteria);

        $result = array();

        foreach ($product as $value) {
            if($value->id != $id) $result[] = $value;
            else continue;
        }

        return $result;
    }

    private function _getViewedNews(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.viewed DESC';
        $criteria->limit = 6;

        $product = News::model()->findAll($criteria);

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
