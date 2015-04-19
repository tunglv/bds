<?php

class PageController extends WebController {

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
                'actions' => array('error', 'index', 'captcha'),
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
    public function actionIndex() {
        $this->layout = '//layouts/main';

//        news
        $criteria = new CDbCriteria();
//        $criteria->compare('t.type', 3);
        $criteria->order = 't.created DESC';
        $criteria->limit = 16;
        $criteria->offset = 0;
        $news = News::model()->findAll($criteria);

//        news viewest
        $criteria = new CDbCriteria();
//        $criteria->compare('t.type', 3);
        $criteria->order = 't.viewed DESC';
        $criteria->limit = 6;
        $news_viewest = News::model()->findAll($criteria);

        //        6 newest rule news
        $criteria = new CDbCriteria();
        $criteria->compare('t.type', 3);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $news_rule = News::model()->findAll($criteria);

//        sale
        $criteria = new CDbCriteria();
        $criteria->compare('t.status', 'ENABLE');
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;
        $criteria->offset = 0;
        $sale = BdsSale::model()->findAll($criteria);

        //        phong thuy viewest
        $criteria = new CDbCriteria();
//        $criteria->compare('t.type', 3);
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $pt = Pt::model()->findAll($criteria);
//        $product_viewed = $this->_getCookieViewedProduct();

        //        kien truc viewest
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 6;
        $architecture = Architecture::model()->findAll($criteria);

        //        newest project
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 10;
        $project = Project::model()->findAll($criteria);


        $maxOffest = Saler::model()->count() < 20 ? 0 : Saler::model()->count() - 20;
        $offset = rand ( 0, $maxOffest);
        //        newest project
        $criteria = new CDbCriteria();
        $criteria->order = 't.created DESC';
        $criteria->limit = 20;
        $criteria->offset = $offset;
        $saler = Saler::model()->findAll($criteria);

//        $product_viewed = $this->_getCookieViewedProduct();

        $this->render('index', array('news'=>$news, 'sale'=>$sale, 'news_viewest' => $news_viewest, 'news_rule' => $news_rule, 'pt' => $pt, 'architecture'=>$architecture, 'project' => $project, 'saler'=>$saler));
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
