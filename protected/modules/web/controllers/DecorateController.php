<?php

class DecorateController extends WebController {

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
        $this->page = "/noi-ngoai-that";
        $this->title = 'Nội, ngoại thất, chung cư, căn hộ chung cư';
        $this->desc = 'Tư vấn, thiết kế nội ngoại thất chưng cư, căn hộ chung cư, nhà ở';

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 1);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_1 = Decorate::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 2);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_2 = Decorate::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 3);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_3 = Decorate::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 4);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_4 = Decorate::model()->findAll($criteria);
//        $product_viewed = $this->_getCookieViewedProduct();

        $viewed = $this->_getViewedDecorate();
        $top_topic = $this->_getHotTopic();

        $this->render('group', array('decorate_1'=>$news_1, 'decorate_2'=>$news_2, 'decorate_3'=>$news_3, 'decorate_4'=>$news_4, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }
    /**
     * @author tunglv Doe <tunglv.1990@gmail.com>
     *
     * @param
     * @return page home of site
     */
    public function actionListTopic(){
        $this->page = "/cac-chu-de-noi-ngoai-that";
        $this->title = 'Các chủ đề nội, ngoại thất, chung cư, căn hộ chung cư';
        $this->desc = 'Các chủ đề tư vấn, thiết kế nội ngoại thất chưng cư, căn hộ chung cư, nhà ở';

        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('TopicDecorate', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed = $this->_getViewedDecorate();
        $top_topic = $this->_getHotTopic();

        $this->render('list',array('dataProvider'=>$dataProvider, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }

    public function actionTopic($alias = null, $id = 0){
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');
        $this->page = "/chu-de-noi-ngoai-that/{$alias}-{$id}";

        $topic = TopicDecorate::model()->findByPk($id);

        $this->title = $topic->title;
        $this->desc = 'Tư vấn, thiết kế nội ngoại thất chưng cư, căn hộ chung cư, nhà ở, '.$topic->title;

        $criteria = new CDbCriteria();
        $criteria->compare('t.topic_id', $id);
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('Decorate', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed = $this->_getViewedDecorate();
        $top_topic = $this->_getHotTopic();

        $this->render('list',array('topic' => $topic, 'dataProvider'=>$dataProvider, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }
    public function actionList($alias = null) {
        $type = 0;
        switch($alias){
            case 'ngoai-that':
                $type = 1;
                break;
            case 'noi-that':
                $type = 2;
                break;
            case 'mach-ban':
                $type = 3;
                break;
            case 'tu-van-noi-ngoai-that':
                $type = 4;
                break;
        }
        $this->layout = '//layouts/main';
        if(!$type) throw new CHttpException(404, 'The requested page does not exist.');
//        $product_viewed = $this->_getCookieViewedProduct();
        $this->page = "/chuyen-muc-noi-ngoai-that/{$alias}";
        $this->title = 'Chuyên mục nội ngoại thất, chung cư, căn hộ chung cư';
        $this->desc = ' Chuyên mục tư vấn, thiết kế nội ngoại thất chưng cư, căn hộ chung cư, nhà ở';

        $criteria = new CDbCriteria();
        $criteria->compare('t.type', $type);
        $criteria->order = 't.created DESC';

        $dataProvider = new CActiveDataProvider('Decorate', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 10,
                //'totalItemCount' => 'page',
                'pageVar' => 'paged',
            ),
        ));

        $viewed = $this->_getViewedDecorate();
        $top_topic = $this->_getHotTopic();

        $this->render('list',array('dataProvider'=>$dataProvider, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }

    public function actionDetail($alias ='',$id = 0){
        $this->layout = '//layouts/main';
        if(!$id) throw new CHttpException(404, 'The requested page does not exist.');

        $this->page = "/noi-ngoai-that/{$alias}-{$id}";

        $news = Decorate::model()->findByPk($id);
//        $product_viewed = $this->_getCookieViewedProduct();

        $this->title = $news->title;
        $this->desc = $news->desc;

        $same_news = $this->_getNewDecorate($id);
        $same_topic = $this->_getSameTopic($news->topic_id, $news->id);

        $viewed = $this->_getViewedDecorate();
        $top_topic = $this->_getHotTopic();
        $this->_setCountView($news->id);

        $this->render('detail', array('decorate'=>$news, 'same'=>$same_news, 'topic'=>$same_topic, 'viewed'=>$viewed, 'top_topic'=>$top_topic));
    }

    private function _getHotTopic(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;

        $topic = TopicDecorate::model()->findAll($criteria);

        return $topic;
    }

    private function _getSameTopic($topic_id = 0, $id = 0){
        $criteria = new CDbCriteria();
        $criteria->compare('t.topic_id', $topic_id);
        $criteria->order = 't.created DESC';
        $criteria->limit = 3;

        $product = Decorate::model()->findAll($criteria);

        $result = array();

        foreach ($product as $value) {
            if($value->id != $id) $result[] = $value;
            else continue;
        }

        return $result;
    }

    private function _getNewDecorate($id = 0){
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 7;

        $product = Decorate::model()->findAll($criteria);

        $result = array();

        foreach ($product as $value) {
            if($value->id != $id) $result[] = $value;
            else continue;
        }

        return $result;
    }

    private function _getViewedDecorate(){
        $criteria = new CDbCriteria();
        $criteria->order = 't.viewed DESC';
        $criteria->limit = 6;

        $product = Decorate::model()->findAll($criteria);

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

    private  function _setCountView($video_id = null){
        $session = Yii::app()->session;

        if (empty($session['view_decorate']))
        {
            $video = Decorate::model()->findByPk($video_id);
            $video->viewed += 1;
            $video->update();
            $session['view_decorate'] = $video_id;
        }
        else {
            $array_id = explode(',',$session['view_decorate']);
            if(!in_array($video_id, $array_id)) {
                $video = Decorate::model()->findByPk($video_id);
                $video->viewed += 1;
                $video->update();
                array_push($array_id, $video_id);
                $session['view_decorate'] = implode(',', $array_id);
            }
        }
    }
}
