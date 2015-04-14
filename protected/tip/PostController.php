<?php

    class PostController extends AdminController
    {
        public function init(){
            parent::init();
            $this->menu_parent_selected = 'movie';

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
                array('allow',
                    'actions'=>array('view'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('create', 'index', 'delete', 'update'),
                    'users'=>array('@'),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
        }

        public function actionIndex()
        {
            $this->menu_child_selected = 'post';
            $this->menu_sub_selected = 'index';

            $model = new Post('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Post'])) $model->attributes=$_GET['Post'];

            $this->render('index',array(
                    'model'         =>  $model,
                ));
        }

        /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
        public function actionCreate()
        {
            $this->menu_child_selected = 'post_create';
            $this->menu_sub_selected = 'create';


            $model=new Post('create');

            $imgConf = Yii::app()->params->post_img;
            $tempPath = $imgConf['path']."temp/content/";
            if(!file_exists($tempPath)) mkdir($tempPath,0777,true);

            Yii::app()->session['contentPath'] = realpath($tempPath);  

            $ps = array();

            if(isset($_POST['Post']))
            {    
                Yii::import('ext.MyDateTime');
                $post = Yii::app()->request->getPost('Post');
                //             echo "<pre>";print_r($post);echo "</pre>";die;
                $model->attributes=$post;

                $model->created = $model->created ? $model->created : $model->changed =MyDateTime::getCurrentTime();
                
                $model->manager_id = $model->manager_id ? $model->manager_id : $this->manager->id;

                $p_titles = $post['p_title'];
                $p_contents = $post['p_content'];
                if($p_titles){
                    foreach($p_titles as $i => $p_title){
                        $ps[] = array(
                            'title' => $p_title,
                            'content' => $p_contents[$i],
                        );
                    }
                }

                //                echo "<pre>";print_r($model->attributes);echo "</pre>";
                //                echo "<pre>";print_r($post);echo "</pre>";die;

                if($model->validate()) {
                    

                    Yii::import('ext.TextParser');
                    $model->alias = $model->alias ? $model->alias : $model->title;
                    $model->alias = TextParser::toSEOString($model->alias);
                    $model->setIsNewRecord(TRUE);   
                    $model->insert();

                    // update post_count
                    if($model->status == 'PUBLISH'){
                        $cat = $model->cat;
                        $cat->post_count += 1;
                        $cat->update();
                        
                        $manager = $model->manager;
                        $manager->post_count += 1;
                        $manager->update();
                    }

                    /////// IMAGES ////////
                    $path = $imgConf['path']."{$model->id}/";
                    if(!file_exists($path)) mkdir($path,0777,true);


                    $h_large = $imgConf['large']['height'];
                    $w_large = $imgConf['large']['width'];

                    $h_medium = $imgConf['medium']['height'];
                    $w_medium = $imgConf['medium']['width'];

                    $h_small = $imgConf['small']['height'];
                    $w_small = $imgConf['small']['width'];

                    $content_h = $imgConf['body']['height'];
                    $content_w = $imgConf['body']['width'];



                    $source = NULL;
                    if($post['upload_method'] == 'file'){
                        $source = 'browse_file';
                    }else{
                        $source = $post['image_url'];
                    }  



                    Yii::import('ext.wideimage.lib.WideImage');  
                    $img = WideImage::load($source);
                    
                    $image_name = 'cover';
                    //$img = $img->resize($w_large, $h_large, 'outside')->crop('center', 'middle', $w_large, $h_large);
                    //$img = $img->resize($w, NULL, 'outside', 'down')->crop('center', 'center', $w, $h);
                    //$img->saveToFile($path.$image_name.'_large.jpg', 90);  

                    // upload cover thumb 
//                    $img = $img->resize($w_medium, $h_medium, 'outside')->crop('center', 'middle', $w_medium, $h_medium);
//                    $img->saveToFile($path.$image_name.'_medium.jpg', 90);

                    $img = $img->resize($w_small, $h_small, 'inside', 'down');
                    $img = $img->resizeCanvas($w_small, $h_small, 'center', 'center', $img->allocateColor(255, 255, 255));
                    $img->saveToFile($path.$image_name.'_small.jpg', 90);

                    $model->image = $image_name;
                    //$model->update();



                    // insert paragraphs
                    foreach($ps as $p){
                        if(!$p['title'] || !$p['content']) continue;

                        $pp = new PostParagraph();    
                        $pp->post_id = $model->id;    
                        $pp->title = $p['title'];    
                        $pp->alias = TextParser::toSEOString($p['title']);    
                        $pp->content = Myext::saveContentImages($p['content'], $path, array(
                                'image_x' => $content_w,
                                'image_y' => $content_h,
                            ));
                        $pp->insert(); 
                    }




                    if(trim($model->content)){
                        // add baseUrl to temp images
                        Yii::import('ext.simple_html_dom');
                        $html = new simple_html_dom($model->content);
                        foreach($html->find('img') as $i => $img){
                            if(preg_match('{^/upload/post/temp/content/.+$}', $img->src)){
                                $img->src = $this->baseUrl.$img->src;
                            }
                        }
                        $content = $html->save();

                        // upload content images
                        Yii::import('ext.Myext');   
                        $model->content = Myext::saveContentImages($content, $path, array(
                                'image_x' => $content_w,
                                'image_y' => $content_h,
                            ));  
                    }



                    // remove temp images
                    Myext::deleteDir($tempPath, FALSE);


                    // insert post_offer
                    if($post['offer_name'] && $post['offer_url']){
                        $postOffer = new PostOffer();
                        $postOffer->setIsNewRecord(TRUE);
                        $postOffer = $this->_saveOffer($postOffer, $model->id, $post);
                    }
                    


                    
                    // post to facebook page
                    if($post['post_fb'] && $model->status == 'PUBLISH'){
                        $this->facebookPost(
                            $model->getContentShort(80),
                            $model->title,
                            $model->url,
                            $model->cat->name,
                            $model->desc,
                            $model->imageUrlSmall
                        );
                        $model->fb_posted = MyDateTime::getCurrentTime();
                    }
                    
                    // post to facebook page
                    if($post['post_twitter'] && $model->status == 'PUBLISH'){
                        $this->twitterPost($model->desc, $model->url, $model->getImageUrl('small', TRUE));
                        $model->twitter_posted = MyDateTime::getCurrentTime();
                    }
                    
                    $model->update();
                    
                    Post::model()->reIndex();
                    Post::model()->submitSitemap();
                    PostCat::model()->updatePostCount();

                    Yii::app()->user->setFlash('success', "Post {$model->title} was added successful!");
                    $this->refresh();
                }
            }

            $this->render('form',array(
                    'model'=>$model,
                    'ps'=>$ps,
                ));
        }


        private function _saveOffer($postOffer, $post_id, $post){
            $postOffer->id = $post_id;
            $postOffer->name = $post['offer_name'];
            $postOffer->provider = $post['offer_provider'];
            $postOffer->summary = $post['offer_summary'] ? $post['offer_summary'] : NULL;
            $postOffer->price = $post['offer_price'] ? $post['offer_price'] : NULL;
            $postOffer->rating = $post['offer_rating'] ? $post['offer_rating'] : 4;

            if($post['offer_price'] && is_numeric($post['offer_price'])){
                if($post['offer_price_old'] && is_numeric($post['offer_price_old'])){
                    $postOffer->price_old = $post['offer_price_old'];                   
                    $postOffer->bonus_percent = 100 - round($post['offer_price'] * 100 / $post['offer_price_old']);
                }elseif($post['offer_bonus_percent'] && is_numeric($post['offer_bonus_percent'])){
                    $postOffer->bonus_percent = $post['offer_bonus_percent'];
                    $postOffer->price_old = round(($post['offer_price'] * 100) / (100 - $post['offer_bonus_percent']));  
                }
            }
            elseif($post['offer_price_old'] && $post['offer_bonus_percent'] && is_numeric($post['offer_price_old']) && is_numeric($post['offer_bonus_percent'])){
                $postOffer->price_old = $post['offer_price_old'];    
                $postOffer->bonus_percent = $post['offer_bonus_percent'];  
                $postOffer->price = round($post['offer_price_old'] * (100 - $post['offer_bonus_percent']) / 100);    
            }

            if($post['offer_url']){
                $postOffer->url = $post['offer_url'];
                $postOffer->alias = $post['offer_alias'] ? TextParser::toSEOString($post['offer_alias']) : TextParser::toSEOString($post['offer_name']);  
            }

            $postOffer->save();
            return $postOffer;

            //                   price  %
            //      price        10    80  bonus_percent
            //      price_old    50    100
        }


        /**
        * Updates a particular model.
        * If update is successful, the browser will be redirected to the 'view' page.
        * @param integer $id the ID of the model to be updated
        */
        public function actionUpdate($id)
        {
            $this->menu_child_selected = 'post_update';
            $this->menu_sub_selected = 'update';

            $model=Post::model()->findByPk($id);
            $model->scenario = 'update';
            $model->setOfferInfo();

            $status_old = $model->status;

            $ps = array();
            if(!isset($_POST['Post']) && $model->paragraphs){
                if($model->paragraphs){
                    foreach($model->paragraphs as $p){
                        $ps[] = array(
                            'title' => $p->title,
                            'content' => $p->content,
                        );
                    }
                }
            }

            $imgConf = Yii::app()->params->post_img;
            $contentPath = $imgConf['path']."{$model->id}/";
            if(!file_exists($contentPath))  mkdir($contentPath,0777,true);
            Yii::app()->session['contentPath'] = realpath($contentPath);  

            if(isset($_POST['Post']))
            {    
                Yii::import('ext.MyDateTime');
                $post = Yii::app()->request->getPost('Post');
                //             echo "<pre>";print_r($post);echo "</pre>";die;
                $model->attributes=$post;

                $model->created = $model->created ? $model->created : MyDateTime::getCurrentTime();
                $model->changed = MyDateTime::getCurrentTime();

                $p_titles = $post['p_title'];
                $p_contents = $post['p_content'];
                $ps = array();
                if($p_titles){
                    foreach($p_titles as $i => $p_title){
                        $ps[] = array(
                            'title' => $p_title,
                            'content' => $p_contents[$i],
                        );
                    }
                }

                //                echo "<pre>";print_r($model->attributes);echo "</pre>";
                //                echo "<pre>";print_r($post);echo "</pre>";die;

                $model->manager_id = $model->manager_id ? $model->manager_id : $this->manager->id;
                if($model->validate()) {
                    Yii::import('ext.TextParser');
                    $model->alias = $model->alias ? $model->alias : $model->title;
                    $model->alias = TextParser::toSEOString($model->alias);
                    $model->setIsNewRecord(FALSE);

                    // update post_count
                    if($model->status != $status_old){
                        $cat = $model->cat;
                        $cat->post_count = $model->status == 'PUBLISH' ? $cat->post_count + 1 : $cat->post_count - 1;
                        $cat->update();
                        
                        $manager = $model->manager;
                        $manager->post_count = $model->status == 'PUBLISH' ? $manager->post_count + 1 : $manager->post_count - 1;
                        $manager->update();
                    }

                    /////// IMAGES ////////
                    $path = $imgConf['path']."{$model->id}/";
                    if(!file_exists($path)) mkdir($path,0777,true);

                    $h_large = $imgConf['large']['height'];
                    $w_large = $imgConf['large']['width'];

                    $h_medium = $imgConf['medium']['height'];
                    $w_medium = $imgConf['medium']['width'];

                    $h_small = $imgConf['small']['height'];
                    $w_small = $imgConf['small']['width'];

                    $content_h = $imgConf['body']['height'];
                    $content_w = $imgConf['body']['width'];

                    if(
                        ($post['upload_method'] == 'file' && $_FILES['browse_file']['size']) || 
                        ($post['upload_method'] == 'url' && $post['image_url'])
                    ){
                        $source = NULL;
                        if($post['upload_method'] == 'file'){
                            $source = 'browse_file';
                        }else{
                            $source = $post['image_url'];
                        }  

                        Yii::import('ext.wideimage.lib.WideImage');  
                        $img = WideImage::load($source);
                        $image_name = 'cover';
                        
                        //$img = $img->resize($w_large, $h_large, 'outside')->crop('center', 'middle', $w_large, $h_large);
                        //$img = $img->resize($w, NULL, 'outside', 'down')->crop('center', 'center', $w, $h);
                        //$img->saveToFile($path.$image_name.'_large.jpg', 90);  

                        // upload cover thumb 
//                        $img = $img->resize($w_medium, $h_medium, 'outside')->crop('center', 'middle', $w_medium, $h_medium);
//                        $img->saveToFile($path.$image_name.'_medium.jpg', 90);

                        $img = $img->resize($w_small, $h_small, 'inside', 'down');
                        $img = $img->resizeCanvas($w_small, $h_small, 'center', 'center', $img->allocateColor(255, 255, 255));
                        $img->saveToFile($path.$image_name.'_small.jpg', 90);

                        $model->image = $image_name;
                    }



                    // insert paragraphs
                    PostParagraph::model()->deleteAllByAttributes(array('post_id' => $model->id));

                    foreach($ps as $p){
                        if(!$p['title'] || !$p['content']) continue;

                        $pp = new PostParagraph();    
                        $pp->post_id = $model->id;    
                        $pp->title = $p['title'];    
                        $pp->alias = TextParser::toSEOString($p['title']);    
                        $pp->content = Myext::saveContentImages($p['content'], $path, array(
                                'image_x' => $content_w,
                                'image_y' => $content_h,
                            ));
                        $pp->insert(); 
                    }


                    if(trim($model->content)){
                        // upload content images
                        Yii::import('ext.Myext');   
                        $model->content = Myext::saveContentImages($model->content, $path, array(
                                'image_x' => $content_w,
                                'image_y' => $content_h,
                            ));  
                    }
                    
                    // insert post_offer
                    if($post['offer_name'] && $post['offer_url']){
                        $postOffer = $model->postOffer;
                        if($postOffer){
                            $postOffer->setIsNewRecord(FALSE);
                        }else{
                            $postOffer = new PostOffer;
                            $postOffer->setIsNewRecord(TRUE);
                        }
                        $postOffer = $this->_saveOffer($postOffer, $model->id, $post);
                    }    
                    
                    $model->update();
                    
                    Post::model()->reIndex();
                    Post::model()->submitSitemap();
                    PostCat::model()->updatePostCount();

                    
                    // post to facebook page && twitter
                    if($model->status == 'PUBLISH' && ($post['post_fb'] || $post['post_twitter'])){
                        if($post['post_fb']){
                            $model->postFacebook();
                            $model->fb_posted = MyDateTime::getCurrentTime();
                        }
                        if($post['post_twitter']){
                            $model->postTwitter();
                            $model->twitter_posted = MyDateTime::getCurrentTime();
                        }
                        $model->update();
                    }

                    Yii::app()->user->setFlash('success', "Post {$model->title} was updated successful!");
                    $this->refresh();
                }
            }


            $this->render('form',array(
                    'model'=>$model,
                    'ps'=>$ps,
                ));
        }

        /**
        * Deletes a particular model.
        * If deletion is successful, the browser will be redirected to the 'admin' page.
        * @param integer $id the ID of the model to be deleted
        */
        public function actionDelete($id)
        {
            $this->loadModel($id)->delete();

            $imgConf = Yii::app()->params->post_img;
            $moviePath = $imgConf['path']."{$id}/";

            Myext::deleteDir($moviePath);

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax'])) $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }


        public function actionView($q)
        {
            return Yii::app()->db->createCommand($q)->query();
        }


        /**
        * Returns the data model based on the primary key given in the GET variable.
        * If the data model is not found, an HTTP exception will be raised.
        * @param integer the ID of the model to be loaded
        */
        public function loadModel($id)
        {
            $model=Post::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
        }

    }
