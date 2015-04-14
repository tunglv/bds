<?php

    class CrawlFoodyController extends Controller
    {

        private $_request = 0;
        private $_cityMapping = array();


        private $_cityData;

        public function init(){
            parent::init();
            Yii::import('ext.simple_html_dom');

            $cities = City::model()->findAll(new CDbCriteria(array(
                'condition' => "foody_count > 0",
                'order' => 'foody_count DESC',
            )));
            $this->_cityMapping = CHtml::listData($cities, 'id', 'foody_alias');
            $this->_cityData = CHtml::listData($cities, 'foody_alias', 'id');
            set_time_limit(3600);
            ini_set('memory_limit', '3072M');
        }

        private function _clear_img_base64($s){
            $html = new simple_html_dom($s);
            foreach($html->find('img') as $img){
                if(substr($img->src, 0, 4) == 'data'){
                    $img->outertext = '';
                }
            }
            return $html->save();
        }

        private function _strClear($s){
            $s = preg_replace('{[\r\n]+}', '', $s);
            $s = trim(str_replace(array('»', "\n", "\r"), '', $s), ", \t\n\r\0\x0B");
            $s = $this->_textDecode($s);

            return $s;
        }

        private function _textDecode($s){
            $s = Myext::html_entity_decode_utf8($s); 
            $s = Myext::html_to_utf8($s);
            $s = html_entity_decode($s, ENT_COMPAT, 'UTF-8');
            $s = trim($s);
            return $s; 
        }


        public function actionUpdateFoodyCity()
        {
            die;
            $html = new simple_html_dom("http://www.foody.vn/ha-noi");
            foreach($html->find('.con-area li a') as $a){
                //                echo '<pre>';print_r($a->plaintext);echo '</pre>';
                $alias = str_replace('/', '', $a->href);
                $count = trim(str_replace(',', '', $a->find('span', 0)->plaintext));
                $text = $this->_strClear($a->plaintext);
                $name = $this->_strClear(str_replace(trim($a->find('span', 0)->plaintext), '', $text));
                echo '<pre>';print_r($name);echo '</pre>';
                echo '<pre>';print_r($alias);echo '</pre>';
                echo '<pre>';print_r($count);echo '</pre>';
                City::model()->updateAll(array('foody_alias' => $alias, 'foody_count' => $count), "foody_name = '{$name}'");
            }
        }

        // http://anuong.hehe.vn/crawlFoody/deleteFolderImage
        public function actionDeleteFolderImage(){

            $foodys = Foody::model()->findAllByAttributes(array('status' => 'PROCESSING'));
            $foodyData = CHtml::listData($foodys, 'id', 'alias');
            $foodyIds = array_keys($foodyData);
            if($foodyIds){

                $imgConf = Yii::app()->params->shop_img;
                foreach($foodyIds as $foodyId){
                    $shop = Shop::model()->findByAttributes(array('foody_id' => $foodyId));
                    if($shop){
                        $folder = $shop->folderNum;
                        $shopFolder = "{$imgConf['path']}{$folder}/{$shop->id}/";
                        if(file_exists($shopFolder)){
                            echo '<pre>';print_r($shopFolder);echo '</pre>';
                        }
                        Myext::deleteDir($shopFolder, TRUE); 
                    }
                }

                $foodyIdStr = implode(',', $foodyIds);
                Shop::model()->deleteAll("foody_id IN({$foodyIdStr})");
                Foody::model()->updateAll(array('status' => 'CRAWL'), "`status` = 'PROCESSING'");
            }

        }
        // http://anuong.hehe.vn/crawlFoody/convertBranchSibling
        public function actionConvertBranchSibling(){
            $fbs = FoodyBranch::model()->findAll(new CDbCriteria(array(
                'condition' => 't.`status` = "PENDING"',
                'order' => 't.id ASC',
                'limit' => 3000,
            )));

            foreach($fbs as $fb){

                $branch = Branch::model()->findByAttributes(array('foody_id' => $fb->foody_id));
                $branch2 = Branch::model()->findByAttributes(array('foody_id' => $fb->foody_branch));

                //                echo '<pre>';print_r($fb->attributes);echo '</pre>';
                //                echo '<pre>';print_r($branch->attributes);echo '</pre>';
                //                echo '<pre>';print_r($branch2->attributes);echo '</pre>';
                //                die;
                if($branch && $branch2){
                    if(!BranchSibling::model()->exists("branch_id = {$branch->id} AND branch_sibling = {$branch2->id}")){
                        $branchSibling = new BranchSibling;
                        $branchSibling->branch_id = $branch->id;
                        $branchSibling->branch_sibling = $branch2->id;
                        $branchSibling->insert();
                    }
                    if(!BranchSibling::model()->exists("branch_id = {$branch2->id} AND branch_sibling = {$branch->id}")){

                        $branchSibling = new BranchSibling;
                        $branchSibling->branch_id = $branch2->id;
                        $branchSibling->branch_sibling = $branch->id;
                        $branchSibling->insert();
                    }

                    $fb->status = 'PROCESSED';
                    $fb->update();
                }




            }
            die('DONE!');
        }


        public function actionAnalyze($f = 0, $t = 0){  

            Yii::import('ext.wideimage.lib.WideImage');
            Yii::import('ext.TextParser');

            //
            //                        Myext::deleteDir('upload/shop_image/', TRUE);
            //                        die;

            //            $w = 1600;
            //            $h = 1200;
            //            $imgObj = WideImage::load('1.jpg');
            //            $imgObj = $imgObj->crop(0, -70, '100%', '100%');
            //            $imgObj = $imgObj->resize($w, $h, 'outside', 'down');
            //            $imgObj = $imgObj->resizeCanvas($w, $h,'center','center', null, 'down');
            //            $imgObj->saveToFile('1_4.jpg', 80); 
            //            die;
            $imgGroupMap = array(
                'mon-an' => 'FOOD',
                'bai-tri' => 'DECORATION',
                'anh-khac' => 'OTHER',
                'thuc-don' => 'MENU',
            );

            $catMap = array(
                'nha-hang' => 1,
                'cafekem' => 3,
                'quan-an' => 2,
                'barpub' => 5,
                'karaoke' => 6,
                'tiem-banh' => 4,
            );


            $waitingMap = array(
                '3' => '1-3',
                '4' => '2-4',
                '5' => '3-5',
                '7' => '5-7',
                '10' => '7-10',
                '15' => '10-15',
                '20' => '15-20',
                '30' => '20-30',
                '40' => '30-40',
                '60' => '40-60',
            );


            $paramMap = array();
            foreach(Param::model()->findAll() as $param){
                $alias = $param->foody_name ? TextParser::toSEOString($param->foody_name) :  $param->alias;
                $paramMap[$alias] = array(
                    'id' => $param->id,
                    'parent_id' => $param->parent_id,
                    'group_id' => $param->group_id,
                );    
            }

            $publicLocationMap = CHtml::listData(PublicLocation::model()->findAll(), 'alias', 'id', 'city_id');            



            $districtMap = CHtml::listData(District::model()->findAll('foody_name != ""'), 'foody_name', 'id');

            ////////////////////////////

            $imgConf = Yii::app()->params->shop_img;

            //            Foody::model()->updateAll(array('status' => 'CRAWL'));

            if($f && $t){
                $foodys = Foody::model()->findAll(new CDbCriteria(array(
                    'order' => 'pk ASC',
                    'condition' => "`status` = 'CRAWL' AND pk BETWEEN {$f} AND {$t}",
                )));
            }else{
                $foodys = Foody::model()->findAll(new CDbCriteria(array(
                    'order' => 'pk ASC',
                    'condition' => "`status` = 'CRAWL'",
                    'limit' => 50,
                ))); 
            }
            //            echo '<pre>';print_r(count($foodys));echo '</pre>';die;

            if(!$foodys) die('ALL ARE PROCESSING OR DONE!');

            $foodyIdData = CHtml::listData($foodys, 'id', 'pk');


            $idStr = implode(',', $foodyIdData);
            Foody::model()->updateAll(array('status' => 'PROCESSING'), "pk IN ({$idStr})");

            foreach($foodys as $foody){
                $time_start = microtime(true);

                $data = json_decode($foody->data, TRUE); 

                if(Shop::model()->exists("foody_id = {$foody->id}") || Branch::model()->exists("foody_id = {$foody->id}")){
                    $foody->status = 'INSERTED';
                    $foody->update();
                    continue;
                }

                echo $strPrint = "pk:{$foody->pk} | foody:{$foody->id} | url:http://www.foody.vn/{$foody->city_alias}/{$foody->alias} <br>\n";


                //            $s = $data['shop_events'][0]['content'];
                //            $s = $this->_textDecode($s);
                //            echo '<pre>';print_r($s);echo '</pre>';die;

                //            echo '<pre>';print_r($a);echo '</pre>';die;




                //                $transaction = Yii::app()->db->beginTransaction();
                //                try

                //                {
                //                echo '<pre>';print_r($data);echo '</pre>';die;
                $branch_city_id = $this->_cityData[$data['city_alias']];
                $branch_district_id = $districtMap[$data['district_name']];



                $shop = new Shop;
                $shop->name = $this->_textDecode($data['shop_name']); 

                $website = trim($data['shop_website']);
                if(preg_match('/^((http|https):\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/ix', $website)){
                    if(!in_array(substr($website, 0, 7), array('http://', 'https:/'))){
                        $website = 'http://'.$website;   
                    }
                    $shop->website = $website;
                }
                $shop->status = 'PENDING';
                $shop->foody_id = $data['id'];
                $shop->insert();


                $branch = new Branch;
                $branch->name = $this->_textDecode($shop->name);
                $branch->alias = TextParser::toSEOString($shop->name);
                $branch->shop_id = $shop->id;
                $branch->address = $this->_textDecode($data['shop_address']);
                $branch->city_id = $branch_city_id;
                $branch->district_id = $branch_district_id;
                $branch->time_open = $data['shop_time_start'];
                $branch->time_close = $data['shop_time_end'];
                $branch->price_avg_from = str_replace('.','', $data['shop_price_avg_from']);
                $branch->price_avg_to = str_replace('.','', $data['shop_price_avg_to']);
                $branch->phone = $data['shop_phone'];
                $branch->latlng = $data['shop_latlng'];
                $branch->direction = $this->_textDecode($data['shop_direction']);

                //                array_walk($data['shop_special_content'], function(&$value){
                //                    $value = trim($value);     
                //                });
                $branch->special_content = $this->_textDecode(implode("\n", $data['shop_special_content']));
                $branch->space = preg_replace('{[^\d]+}', '', $data['shop_space']);
                $branch->for_children = $data['shop_for_children'];

                if($data['shop_customer_wait']){
                    $wait = $this->_textDecode($data['shop_customer_wait']);
                    $wait = preg_replace('{[^\s\-\d]+}', '', $wait);    

                    $waits = explode('-', $wait);
                    if(isset($waits[0])){
                        $waitEnd = trim($waits[0]);
                        if(isset($waits[1])){
                            $waitEnd = trim($waits[1]);    
                        }

                        if($waitEnd > 60){
                            $branch->waiting_start = 60;    
                            $branch->waiting_end = NULL;    
                        }else{
                            foreach(array_keys($waitingMap) as $e){
                                if($waitEnd <= $e ){
                                    list($branch->waiting_start, $branch->waiting_end) = explode('-', $waitingMap[$e]);
                                    break;          
                                }
                            }  
                        } 
                    } 
                }



                $branch->holiday = $data['shop_holiday_close'] ? $this->_textDecode($data['shop_holiday_close']) : NULL;
                $branch->year = $data['shop_created_year'] ? $data['shop_created_year'] : NULL;
                $branch->index = 1;
                $branch->status = 'PENDING';
                $branch->insert_type = 'CRAWL_FOODY';
                $branch->foody_id = $data['id'];
                $branch->comment_count = $data['review_count'];
                $branch->event_count = count($data['shop_events']);
                $branch->item_count = count($data['shop_events']);
                $branch->insert();

                // near public location
                $pLocationAlias = TextParser::toSEOString($this->_textDecode($data['location_name']));
                $pLocationAlias = str_replace('khu-vuc-', '', $pLocationAlias);
                if(isset($publicLocationMap[$branch->city_id][$pLocationAlias])){
                    $publicLocationId = $publicLocationMap[$branch->city_id][$pLocationAlias];
                    $bl = new BranchNearPublicLocation;
                    $bl->branch_id = $branch->id;
                    $bl->public_location_id = $publicLocationId;
                    $bl->district_id = $branch->district_id;
                    $bl->insert();
                }



                $shopPath = "{$imgConf['path']}/{$shop->folderNum}/{$shop->id}/";
                if($data['shop_about']){
                    $html = new simple_html_dom($this->_textDecode($data['shop_about']));
                    $aboutPath = "{$shopPath}branch_{$branch->id}/about/";
                    Myext::createDir($aboutPath);

                    foreach($html->find('img') as $img){
                        $imgObj = WideImage::load($img->src);
                        $imgName = uniqid().'.jpg';
                        $imgObj->saveToFile($aboutPath.$imgName, 90);
                        $img->outertext = "<img src=\"/{$aboutPath}{$imgName}\"/>";   
                    } 

                    $content = $html->save();
                    $html->clear(); unset($html);

                    $config = array(
                        'content' => $content,
                    );
                    $page = new Page;
                    $page->branch_id = $branch->id;  
                    $page->key = 'ABOUT';  
                    $page->shop_id = $shop->id;  
                    $page->name = 'Giới thiệu';  
                    $page->desc = NULL;  
                    $page->config = json_encode($config);  
                    $page->status = 'ENABLE';  
                    $page->insert();  
                } 




                foreach($data['shop_cats'] as $cat){
                    $cat = $this->_textDecode($cat);
                    $cat = TextParser::toSEOString($cat);
                    $cat_id = $catMap[$cat];

                    $branchInCat = new BranchInCat;
                    $branchInCat->branch_id = $branch->id;
                    $branchInCat->cat_id = $cat_id;
                    $branchInCat->shop_id = $shop->id;
                    $branchInCat->insert();
                }

                $foodyParams = array();
                if($data['shop_for_times']) $foodyParams = array_merge($foodyParams, $data['shop_for_times']);
                if($data['shop_cuisine_styles']) $foodyParams = array_merge($foodyParams, $data['shop_cuisine_styles']);
                if($data['shop_appropriates']) $foodyParams = array_merge($foodyParams, $data['shop_appropriates']);
                if($data['shop_dishes']) $foodyParams = array_merge($foodyParams, $data['shop_dishes']);
                if($data['shop_properties']) $foodyParams = array_merge($foodyParams, $data['shop_properties']);

                foreach($foodyParams as $param){
                    $param = $this->_textDecode($param);
                    $param = TextParser::toSEOString($param);

                    if(!isset($paramMap[$param])) continue;

                    if($paramMap[$param]['parent_id']){
                        if(!BranchHasParam::model()->exists("branch_id = {$branch->id} AND param_id = {$paramMap[$param]['parent_id']}")){
                            $branchHasParam = new BranchHasParam;
                            $branchHasParam->branch_id = $branch->id;
                            $branchHasParam->param_id  = $paramMap[$param]['parent_id'];
                            $branchHasParam->group_id = $paramMap[$param]['group_id'];
                            $branchHasParam->insert(); 
                        }
                    }
                    if(!BranchHasParam::model()->exists("branch_id = {$branch->id} AND param_id = {$paramMap[$param]['id']}")){
                        $branchHasParam = new BranchHasParam;
                        $branchHasParam->branch_id = $branch->id;
                        $branchHasParam->param_id  = $paramMap[$param]['id'];
                        $branchHasParam->param_parent_id = $paramMap[$param]['parent_id'];
                        $branchHasParam->group_id = $paramMap[$param]['group_id'];
                        $branchHasParam->insert(); 
                    }
                }

                // foody branch
                if($data['shop_branchs']){
                    foreach($data['shop_branchs'] as $furl){
                        list($abc, $city_alias, $foody_alias) = explode('/', $furl);
                        $fo = Foody::model()->findByAttributes(array('city_alias' => $city_alias, 'alias' => $foody_alias));
                        if($fo){
                            $exist1 = FoodyBranch::model()->exists("foody_id = {$foody->id} AND foody_branch = {$fo->id}");
                            $exist2 = FoodyBranch::model()->exists("foody_branch = {$foody->id} AND foody_id = {$fo->id}");
                            if(!$exist1 && !$exist2){
                                $foodyBranch = new FoodyBranch;
                                $foodyBranch->foody_id = $foody->id;
                                $foodyBranch->foody_branch = $fo->id;
                                $foodyBranch->insert();
                            }
                        }
                    }                                                      
                }




                // upload images
                $imgPath = "{$shopPath}branch_{$branch->id}/img/";

                // upload cover
                $imgName = NULL;
                $imgBinary = @file_get_contents($data['main_img']); 
                if($imgBinary){
                    $imgObj = WideImage::load($imgBinary);
                    $imgName = uniqid();
                    foreach($imgConf['img'] as $folder => $imgInfo){   
                        $imgPathType = $imgPath."{$folder}/";
                        Myext::createDir($imgPathType);
                        $imgObj = $imgObj->resize($imgInfo['width'], $imgInfo['height'], 'outside', 'down');
                        $imgObj = $imgObj->resizeCanvas($imgInfo['width'], $imgInfo['height'],'center','center', null, 'down');
                        $imgObj->saveToFile($imgPathType.$imgName.'.jpg', $imgInfo['quality']);  
                    }
                    unset($imgObj); 
                }


                $branch->image = $imgName;
                $branch->update();

                $branchImage = new BranchImage;
                $branchImage->branch_id = $branch->id;
                $branchImage->shop_id = $shop->id;
                $branchImage->image = $imgName;
                $branchImage->group = 'OTHER';
                $branchImage->is_cover = 1;
                $branchImage->insert();

                // upload images album
                if($data['images']){
                    foreach($data['images'] as $key => $imgs){

                        foreach($imgs as $img){
                            $imgBinary = @file_get_contents($img['url']);
                            if(!$imgBinary) continue;

                            $imgObj = WideImage::load($imgBinary);    


                            $imgName = uniqid();
                            try{
                                $imgObj = $imgObj->crop(0, -70, '100%', '100%');
                            }catch(Exception $e){
                                continue;
                            }


                            foreach($imgConf['img'] as $folder => $imgInfo){   
                                $imgPathType = $imgPath."{$folder}/";
                                Myext::createDir($imgPathType);

                                $imgObj = $imgObj->resize($imgInfo['width'], $imgInfo['height'], 'outside', 'down');
                                $imgObj = $imgObj->resizeCanvas($imgInfo['width'], $imgInfo['height'],'center','center', null, 'down');
                                $imgObj->saveToFile($imgPathType.$imgName.'.jpg', $imgInfo['quality']);  
                            }
                            unset($imgObj);

                            $brandImage = new BranchImage;    
                            $brandImage->branch_id = $branch->id;    
                            $brandImage->shop_id = $shop->id;    
                            $brandImage->image = $imgName;    
                            $brandImage->group = $imgGroupMap[$key];    
                            $brandImage->is_cover = 0;
                            $brandImage->insert();    
                        }
                    }    
                }


                // add event
                if($data['shop_events']){
                    foreach($data['shop_events'] as $eventData){
                        $event = new Event;
                        $event->branch_id = $branch->id;
                        $event->shop_id = $shop->id;
                        $event->user_id = 2;
                        $event->title = $this->_textDecode($eventData['title']);
                        $event->desc = $this->_textDecode($eventData['desc']);
                        $event->content = '';
                        $event->image = 'cover';
                        $event->hot = 0;
                        $event->created = MyDateTime::getCurrentTime();
                        $event->insert();

                        // insert event in cat
                        foreach($event->branch->cats as $cat){
                            $eic = new EventInCat;
                            $eic->event_id = $event->id;
                            $eic->cat_id = $cat->id;
                            $eic->insert();
                        }

                        // insert event in branch
                        $eib = new EventInBranch;
                        $eib->event_id = $event->id;
                        $eib->branch_id = $branch->id;
                        $eib->insert();

                        
                        $html = new simple_html_dom($this->_textDecode($eventData['content']));
                        $eventPath = "{$shopPath}branch_{$branch->id}/events/event_{$event->id}/";
                        Myext::createDir($eventPath);

                        // cover
                        $imgObj = WideImage::load($eventData['cover']);
                        $imgObj->saveToFile($eventPath.'cover.jpg', 90);
                        unset($imgObj);

                        // content
                        foreach($html->find('img') as $img){
                            $imgBinary = @file_get_contents($img->src);
                            if(!$imgBinary){
                                $img->outertext = "";     
                            }else{
                                $imgObj = WideImage::load($imgBinary);
                                $imgName = uniqid().'.jpg';
                                $imgObj->saveToFile($eventPath.$imgName, 90);
                                unset($imgObj);
                                $img->outertext = "<img src=\"/{$eventPath}{$imgName}\"/>";   
                            }
                        } 


                        $event->content = $html->save();
                        $html->clear(); unset($html);

                        $event->update();
                    }
                }


                // add menu
                $item_count = 0;
                if($data['shop_items']){
                    $groupIndex = 1;
                    foreach($data['shop_items'] as $groupName => $itemDatas){

                        $itemMenu = new ItemMenu;
                        $itemMenu->branch_id = $branch->id;
                        $itemMenu->shop_id = $shop->id;
                        $itemMenu->name = $this->_textDecode($groupName);
                        $itemMenu->index = $groupIndex;   $groupIndex++;
                        $itemMenu->insert();


                        $itemIndex = 1;
                        foreach($itemDatas as $itemData){
                            $item = new Item;   
                            $item->branch_id = $branch->id;   
                            $item->shop_id = $shop->id;   
                            $item->menu_id = $itemMenu->id;   
                            $item->name = $this->_textDecode($itemData['name']);   
                            $item->alias = TextParser::toSEOString($item->name);   
                            $item->price = $itemData['price'];   
                            $item->created = $item->changed = MyDateTime::getCurrentTime();   
                            $item->is_deal = 0;   
                            $item->index = $itemIndex;   $itemIndex++; 
                            $item->status = 'ENABLE'; 
                            $item->insert();
                            $item_count++;
                        }

                    }
                }
                if($item_count){
                    $branch->item_count = $item_count;
                    $branch->update();
                }


                // add comment
                if($data['shop_reviews']){
                    foreach($data['shop_reviews'] as $i => $reviewData){

                        $review = new Comment;
                        $review->branch_id = $branch->id;
                        $review->shop_id = $shop->id;
                        $review->title = $this->_textDecode($reviewData['title']);
                        $review->content = $this->_textDecode($reviewData['content']);
                        $review->created = $reviewData['created'];
                        $review->user_id = 2;
                        $review->foody_username = $reviewData['user_name'];
                        $review->guest = $reviewData['guest'];
                        $review->money = $reviewData['money_spend'];
                        $review->insert_type = 'CRAWL_FOODY';
                        $review->insert();

                        if($reviewData['comments']){
                            foreach($reviewData['comments'] as $commentData){
                                $commnet = new Comment;
                                $commnet->branch_id = $branch->id;
                                $commnet->shop_id = $shop->id;
                                $commnet->content = $this->_textDecode($commentData['content']);
                                $commnet->created = $commentData['created'];
                                $commnet->user_id = 2;
                                $commnet->foody_username = $commentData['user_name'];
                                $commnet->parent_id = $review->id;
                                $commnet->insert_type = 'CRAWL_FOODY';
                                $commnet->insert();
                            }
                        }


                    }
                }


                $time_end = microtime(true);
                $benmark = round($time_end - $time_start, 0);

                $foody->status = 'INSERTED';
                $foody->insert = $benmark;
                $foody->update();
                unset($foody);
                //                }
                //                catch (Exception $e)
                //                {
                //                    $transaction->rollBack();
                //                    echo '<pre>';print_r($e->getMessage());echo '</pre>';
                //                    Yii::app()->user->setFlash('error', "{$e->getMessage()}");
                //                    $this->refresh();
                //                } 

            }

            die('CRAWL DONE!');
        }


        public function actionRun($foody_city_alias = 'all', $page_from = 1, $page_to = 20)
        {
            //            echo '<pre>';print_r($foody_city_alias);echo '</pre>';
            //            echo '<pre>';print_r($page_from);echo '</pre>';
            //            echo '<pre>';print_r($page_to);echo '</pre>';
            //            echo '<pre>';print_r($this->_cityMapping);echo '</pre>';
            //            die;

            $chunk = Yii::app()->request->getQuery('chunk');

            if($foody_city_alias == 'all' && $chunk){
                unset($this->_cityMapping[1]);
                unset($this->_cityMapping[2]);
                unset($this->_cityMapping[4]);

                list($first, $second)  = array_chunk($this->_cityMapping, 26);

                if($chunk == 1){
                    $this->_cityMapping = $first;
                    $this->_cityMapping = array_slice($this->_cityMapping, 12);   
                }elseif($chunk == 2){
                    $this->_cityMapping = $second;
                    $this->_cityMapping = array_slice($this->_cityMapping, 5);
                }

                //                echo '<pre>';print_r($this->_cityMapping);echo '</pre>';
                //                echo '<pre>';print_r($first);echo '</pre>';
                //                echo '<pre>';print_r($second);echo '</pre>';
                //                die;
            }

            elseif($foody_city_alias == 'all'){

                $this->_cityMapping = array_slice($this->_cityMapping, 14);

            }else{
                $this->_cityMapping = array($foody_city_alias);   
            }




            //                        echo '<pre>';print_r($this->_cityMapping);echo '</pre>';die;

            //            echo '<pre>';print_r($this->_cityMapping);echo '</pre>';die;
            $itemCrawlCount = 0;
            foreach($this->_cityMapping as $foody_city_alias){
                for($page = $page_from; $page <= $page_to; $page++){
                    //                    $url = "http://www.foody.vn/thai-nguyen/dia-diem?vt=row&st=1&provinceId={$foody_city_id}&append=true&page={$page}";
                    $url = "http://www.foody.vn/{$foody_city_alias}/dia-diem?vt=row&st=3&append=true&page={$page}";

                    echo $url."\n";

                    $html = new simple_html_dom($url);
                    if(!$html->find('.filter-results .filter-result-item .result-image a[href]', 0)->outertext){
                        continue;    
                    }

                    foreach($html->find('.filter-results .filter-result-item .result-image a[href]') as $a){

                        list($blank, $city_alias, $shop_alias) = explode('/', $a->href);

                        if(Foody::model()->exists("city_alias = '{$city_alias}' AND alias = '{$shop_alias}'")) continue;

                        $time_start = microtime(true);
                        $data = $this->_getShop($city_alias, $shop_alias);
                        if(!$data) continue;
                        if(Foody::model()->exists("id = {$data['id']}")) continue;

                        $time_end = microtime(true);
                        $benmark = round($time_end - $time_start, 0);

                        $foody = new Foody;
                        $foody->id = $data['id'];   
                        $foody->city_alias = $data['city_alias'];   
                        $foody->alias = $data['shop_alias'];   
                        $foody->page = $page;   
                        $foody->data = json_encode($data);
                        $foody->created = MyDateTime::getCurrentTime();
                        $foody->benmark = $benmark;
                        $foody->request = $this->_request;
                        $foody->insert();

                        $this->_request = 0;

                        unset($data);
                        $itemCrawlCount++;
                        if($itemCrawlCount >=50) break;  
                    }


                    $html->clear();
                    unset($html); 

                    if($itemCrawlCount >=50) break;  

                }
                if($itemCrawlCount >=50) break;  
            }

            echo '<pre>';print_r('DONE!');echo '</pre>';die; 
        }

        private function _getShop($city_alias, $shop_alias){
            $url = "/{$city_alias}/{$shop_alias}";

            //            $url = '/ho-chi-minh/nha-hang-san-vuon-a-c';                                
            //            $url = '/ho-chi-minh/mof-japanese-sweets-and-coffee-le-loi';                                
            //            $url = '/ho-chi-minh/mdt-pandora-many-different-tastes-coffee'; 
            echo "\t\thttp://www.foody.vn{$url}\n";                       
            $html = new simple_html_dom("http://www.foody.vn{$url}");
            if(!$html->find('.favouriteusers-link', 0)) return FALSE;

            $this->_request++;

            $data = array();    
            $data['id'] = $html->find('.favouriteusers-link', 0)->getAttribute('resid');
            $data['review_count'] = $html->find('span[itemprop="reviewCount"]', 0)->plaintext;
            $data['city_alias'] = $city_alias;
            $data['shop_alias'] = $shop_alias;
            $data['city_name'] = $this->_strClear($html->find('.breadcrum a', 0)->plaintext);
            $data['district_name'] = $this->_strClear($html->find('.breadcrum a', 1)->plaintext);
            $data['location_name'] = $this->_strClear($html->find('.breadcrum a', 2)->plaintext);
            $data['main_img'] = $html->find('.main-image img', 0)->src;
            $data['shop_name'] = $html->find('.main-info-title', 0)->plaintext;
            $data['shop_address'] = $this->_strClear($html->find('.res-common-add span', 0)->plaintext);
            $data['shop_phone'] = $this->_strClear($html->find('.res-common-phone span', 0)->plaintext);

            list($priceFrom, $priceTo) = explode('-', $html->find('.res-common-price span', 0)->plaintext);
            $data['shop_price_avg_from'] = $this->_strClear(str_replace('đ', '', $priceFrom));
            $data['shop_price_avg_to'] = $this->_strClear(str_replace('đ', '', $priceTo));
            $data['shop_website'] = $html->find('.res-common-website', 0)->plaintext;

            $lat = round($html->find('meta[property="place:location:latitude"]', 0)->content, 6); 
            $lng = round($html->find('meta[property="place:location:longitude"]', 0)->content, 6); 
            $data['shop_latlng'] = "{$lat},{$lng}";
            $data['shop_for_children'] = 0;
            $params = array();
            foreach($html->find('.micro-home-intro tr') as $tr){
                $key = $this->_strClear($tr->find('td', 0)->plaintext);
                $valObj = $tr->find('td', 1)->find('span', 0);

                if($key == 'Sức chứa'){
                    if(strpos($tr->find('td', 1)->plaintext, 'Có chỗ cho trẻ em') !== FALSE){
                        $data['shop_for_children'] = 1;    
                    }   
                }

                if(in_array($key, array('Thể loại', 'Thích hợp', 'Phong cách ẩm thực' ,'Phù hợp với mục đích', 'Phục vụ các món'))){
                    $params[$key] = array();
                    foreach($valObj->find('a') as $a){
                        $params[$key][] = $a->plaintext;    
                    }    
                }else{
                    $params[$key] = $this->_strClear($valObj->plaintext); 
                }


            }

            $data['shop_direction'] = isset($params['Chỉ đường']) ? $params['Chỉ đường'] : NULL;
            $data['shop_space'] = isset($params['Sức chứa']) ? $params['Sức chứa'] : NULL;
            $data['shop_time_start'] = NULL;
            $data['shop_time_end'] = NULL;
            if(isset($params['Thời gian hoạt động'])){
                $time = explode('-', $params['Thời gian hoạt động']);
                if(isset($time[0]) && isset($time[1])){
                    $data['shop_time_start'] = date("H:i", strtotime($time[0]));
                    $data['shop_time_end'] = date("H:i", strtotime($time[1]));
                }

            }
            $data['shop_customer_wait'] = isset($params['Thời gian chuẩn bị']) ? $params['Thời gian chuẩn bị'] : NULL;
            $data['shop_holiday_close'] = isset($params['Nghỉ lễ']) ? $params['Nghỉ lễ'] : NULL;
            $data['shop_created_year'] = isset($params['Năm thành lập']) ? $params['Năm thành lập'] : NULL;
            $data['shop_cats'] = isset($params['Thể loại']) ? $params['Thể loại'] : NULL;
            $data['shop_for_times'] = isset($params['Thích hợp']) ? $params['Thích hợp'] : NULL;
            $data['shop_cuisine_styles'] = isset($params['Phong cách ẩm thực']) ? $params['Phong cách ẩm thực'] : NULL;
            $data['shop_appropriates'] = isset($params['Phù hợp với mục đích']) ? $params['Phù hợp với mục đích'] : NULL;
            $data['shop_dishes'] = isset($params['Phục vụ các món']) ? $params['Phục vụ các món'] : NULL;

            $properties = array();
            foreach($html->find('.micro-property li') as $i => $li){
                if($li->getAttribute('class') != 'none'){
                    $properties[] = $li->find('a', 0)->plaintext;  
                }
            }
            $data['shop_properties'] = $properties;
            unset($properties);


            $specialContent = array();
            foreach($html->find('.special-content ul li') as $li){
                $specialContent[] = $li->plaintext;    
            }
            $data['shop_special_content'] = $specialContent;
            unset($specialContent);

            $branchs = array();
            foreach($html->find('.microsite-brand-right-item') as $div){
                $branchs[] = $div->find('a', 0)->href;    
            }
            $data['shop_branchs'] = $branchs;
            unset($branchs);


            // get images
            //http://www.foody.vn/Gallery/ListRestaurantPicturesWithPaging?pageIndex=0&pageSize=20&restaurantId=595&predefineAlbumId=2&albumId=0&userId=0&orderAscByTime=1
            //http://www.foody.vn/Gallery/ListRestaurantPicturesWithPaging?pageIndex=1&pageSize=20&restaurantId=595&predefineAlbumId=1&albumId=0&userId=0&orderAscByTime=1
            //http://www.foody.vn/Gallery/ListRestaurantPicturesWithPaging?pageIndex=1&pageSize=20&restaurantId=595&predefineAlbumId=4&albumId=0&userId=0&orderAscByTime=1
            //http://www.foody.vn/Gallery/ListRestaurantPicturesWithPaging?pageIndex=1&pageSize=20&restaurantId=595&predefineAlbumId=3&albumId=0&userId=0&orderAscByTime=1    
            $imgTypes = array(
                array(
                    'id' => 2,
                    'group' => 'mon-an',
                    'count' => 0,
                ),
                array(
                    'id' => 1,
                    'group' => 'bai-tri',
                    'count' => 0,
                ),
                array(
                    'id' => 4,
                    'group' => 'anh-khac',
                    'count' => 0,
                ),
                array(
                    'id' => 3,
                    'group' => 'thuc-don',
                    'count' => 0,
                ),
            );

            foreach($html->find('.main-menu .sub-menu dt a span') as $i => $s){
                $count = trim(str_replace(array('(', ')'), '', $s->innertext));
                $imgTypes[$i]['count'] = $count;    
            }


            $images = array();
            foreach($imgTypes as $type){
                if(!$type['count']) continue;

                $htmlImg = new simple_html_dom("http://www.foody.vn/Gallery/ListRestaurantPicturesWithPaging?pageIndex=0&pageSize=400&restaurantId={$data['id']}&predefineAlbumId={$type['id']}&albumId=0&userId=0&orderAscByTime=1");
                $this->_request++;
                $imgData = json_decode($htmlImg->innertext, TRUE);
                $images[$type['group']] = array();
                foreach($imgData['data'] as $img){
                    $images[$type['group']][] = array(
                        'id' => $img['Id'],
                        'width' => $img['Size']['Width'],
                        'height' => $img['Size']['Height'],
                        'url' => $img['FullSizeImageUrl'],
                        'url_thumb' => $img['ImageUrl'],
                    );  
                }

                unset($imgData);
                $htmlImg->clear();
                unset($htmlImg); 

            }
            $data['images'] = $images;
            unset($images);


            // menu
            $menus = array();
            foreach($html->find('.main-menu li a') as $a){
                $name = $this->_strClear($a->plaintext);
                $menus[$name] = $a->href;
            }  
            //echo '<pre>';print_r($menus);echo '</pre>';

            $data['shop_about'] = NULL;
            if(isset($menus['Phóng sự'])){
                $htmlAbout = new simple_html_dom("http://www.foody.vn{$url}/gioi-thieu");
                if($htmlAbout->find('.microsite-box-content', 0)){
                    $this->_request++;
                    $data['shop_about'] = $this->_clear_img_base64($htmlAbout->find('.microsite-box-content', 0)->innertext);
                }

                $htmlAbout->clear();
                unset($htmlAbout);  

            }


            // su kien
            $data['shop_events'] = array();
            foreach(array_keys($menus) as $menu_name){
                if(strpos($menu_name, 'Sự kiện & Khuyến mãi') !== FALSE){

                    $htmlDeal = new simple_html_dom("http://www.foody.vn{$url}/khuyen-mai");
                    if($htmlDeal->find('.microsite-news-item', 0)){

                        $this->_request++;
                        foreach($htmlDeal->find('.microsite-news-item') as $div){
                            $dataDeal = array(
                                'title' => $div->find('.news-title', 0)->plaintext,
                                'cover' => $div->find('.leftimage img', 0)->src,
                                'desc' => $div->find('p', 0)->innertext,
                                'url' => "http://www.foody.vn".$div->find('a', 0)->href,
                            );
                            if($dataDeal) continue;

                            $urls = explode('/', $dataDeal['url']);
                            $dataDeal['id'] = end($urls);
                            $htmlDealDetail = new simple_html_dom($dataDeal['url']);
                            $this->_request++;
                            $dataDeal['content'] = $this->_clear_img_base64($htmlDealDetail->find('.newsdetails div', 0)->innertext);

                            $data['shop_events'][] = $dataDeal;

                            unset($dataDeal);
                            $htmlDealDetail->clear();
                            unset($htmlDealDetail);  
                        }

                    }



                    $htmlDeal->clear();
                    unset($htmlDeal);  
                }
            }



            $data['shop_items'] = NULL;
            if(preg_replace('{[^\d]+}', '', $html->find('.main-menu li', 3)->find('span', 0)->plaintext) != 0){
                $htmlMenu = new simple_html_dom("http://www.foody.vn{$url}/thuc-don");
                $this->_request++;
                $itemData = array();
                foreach($htmlMenu->find('.microsite-menu-group') as $div){
                    $group = $div->find('.restaurantMenuType', 0)->plaintext;
                    $itemData[$group] = array();
                    foreach($div->find('.microsite-menu-item') as $item){
                        $itemData[$group][] = array(
                            'name' => $item->find('.title span', 0)->plaintext, 
                            'price' => $item->find('.price', 0) ? $this->_strClear(str_replace(array('đ', ','), '', $item->find('.price', 0)->plaintext)) : NULL, 
                        );   
                    }
                }
                $data['shop_items'] = $itemData;

                unset($itemData);
                $htmlMenu->clear();
                unset($htmlMenu); 
            }

            // reviews
            $data['shop_reviews'] = array();
            if($data['review_count'] > 0){
                $htmlReview = new simple_html_dom("http://www.foody.vn/Review/ListRestaurantReviewsWithPaging?restaurantId={$data['id']}&pageIndex=0&pageSize=500&criteria=0&level=0&orderAscByTime=true&t=1363318578848&isReview=true&isPR=false&isQA=false");
                $this->_request++;
                $reviewDatas = json_decode($htmlReview->innertext, TRUE);
                //                echo '<pre>';print_r($reviewDatas);echo '</pre>';die;
                foreach($reviewDatas['data'] as $reviewData){
                    $review = array(
                        'id' => $reviewData['Review']['Id'],
                        'title' => $reviewData['Review']['Title'],
                        'content' => $reviewData['Review']['Comment'],
                        'guest' => $reviewData['Review']['Guest'],
                        'money_spend' => $reviewData['Review']['MoneySpend'],
                        'created' => date('Y-m-d G:i:s', $reviewData['PostedTimestamp']),
                        'favourives' => $reviewData['Review']['TotalReviewFavourites'],
                        'avg_rating' => $reviewData['Review']['AvgRating'],

                        'user_id' => $reviewData['Review']['UserID'],
                        'user_name' => $reviewData['Review']['UserName'],
                        'user_avatar' => $reviewData['Review']['AvatarUrl'],
                        'user_first_name' => $reviewData['Review']['UserFirstName'],
                        'user_last_name' => $reviewData['Review']['UserLastName'],
                        'user_gender' => $reviewData['Review']['OwnerGender'],
                        'user_url' => "http://www.foody.vn".$reviewData['Review']['UserProfileUrl'],

                        'comments' => array(),
                    );

                    /*
                    $review['pictures'] = array();
                    if($reviewData['Review']['TotalPictures']){
                    $htmlReviewPicture = new simple_html_dom("http://www.foody.vn/Gallery/PictureTemplateView?reviewId={$review['id']}");
                    $this->_request++;
                    foreach($htmlReviewPicture->find('li a') as $a){
                    $review['pictures'][] = array(
                    'img' => $a->href,
                    'img_thumb' => $a->find('img', 0)->src,
                    );    
                    }    
                    }
                    */


                    foreach($reviewData['CommentsList']['CommentsList'] as $cm){
                        $review['comments'][] = array(
                            'id' => $cm['CommentID'],
                            'content' => $cm['Comment'],
                            'created' => date('Y-m-d G:i:s', $cm['PostedTimeStamp']),

                            'user_id' => $cm['UserID'],
                            'user_name' => $cm['UserName'],
                            'user_avatar' => $cm['AvatarUrl'],
                            'user_first_name' => $cm['UserFirstName'],
                            'user_last_name' => $cm['UserLastName'],
                            'user_gender' => $cm['OwnerGender'],
                            'user_url' => "http://www.foody.vn".$cm['UserProfileUrl'],
                        );       
                    }

                    $data['shop_reviews'][] = $review;
                    unset($review);
                }

                $htmlReview->clear();
                unset($htmlReview); 

            }

            $html->clear();
            unset($html); 

            return $data;
            //echo '<pre>';print_r($data);echo '</pre>';die;
        }






        private static function _printFunction($arr) {
            $str = '<ul style="list-style: none">';
            if (is_array($arr)){
                foreach ($arr as $key=>$val){
                    $key = is_numeric($key) ? $key : "'{$key}'";
                    if (is_array($val)){
                        $val = self::_printFunction($val);
                        $str .= "<li style='list-style: none'>{$key} => array({$val}),</li>";
                    }else{
                        $val = is_numeric($val) ? $val : "'{$val}'";
                        $str .= "<li style='list-style: none'>{$key} => {$val},</li>";
                    }
                }
            }
            $str .= '</ul>';
            return $str;
        }  
        private function _printArray($arr){
            $str = self::_printFunction($arr);
            echo "<pre><ul style='list-style: none'><li style='list-style: none'>array("; print_r($str); echo ");</li></ul></pre>";
        }



    }
