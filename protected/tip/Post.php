<?php

    /**
    * This is the model class for table "post".
    *
    * The followings are the available columns in table 'post':
    * @property string $id
    * @property string $title
    * @property string $alias
    * @property string $desc
    * @property string $content
    * @property string $cat_id
    * @property string $user_id
    * @property string $source
    * @property string $created
    * @property string $status
    * @property string $like_count
    * @property string $dislike_count
    *
    * The followings are the available model relations:
    * @property Cat $cat
    * @property User $user
    */
    class Post extends Model
    {
        public $p_title;
        public $p_content;

        public $offer_name;
        public $offer_summary;
        public $offer_provider;
        public $offer_price;
        public $offer_price_old;
        public $offer_bonus_percent;
        public $offer_url;
        public $offer_alias;
        public $offer_rating;

        public $upload_method = 'file';
        public $image_file;
        public $image_url;

        public $post_fb = 0;
        public $post_twitter = 0;

        public function setOfferInfo(){
            if($this->postOffer){
                $this->offer_name = $this->postOffer->name;
                $this->offer_summary = $this->postOffer->summary;
                $this->offer_provider = $this->postOffer->provider;
                $this->offer_price = $this->postOffer->price;
                $this->offer_price_old = $this->postOffer->price_old;
                $this->offer_bonus_percent = $this->postOffer->bonus_percent;
                $this->offer_url = $this->postOffer->url;
                $this->offer_alias = $this->postOffer->alias;
                $this->offer_rating = $this->postOffer->rating;
            }
        }

        /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return Post the static model class
        */
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }

        /**
        * @return string the associated database table name
        */
        public function tableName()
        {
            return 'post';
        }

        /**
        * @return array validation rules for model attributes.
        */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('title, desc, status', 'required'),
                array('title, alias', 'length', 'max'=>64),
                array('alias', 'unique'),

                array('desc', 'length', 'max'=>160),
                array('cat_id, manager_id', 'length', 'max'=>10),
                array('status', 'match', 'pattern' => '/^(PUBLISH|PENDING|DISABLE)$/i'),
                array('content, source, image_url, upload_method', 'safe'), 

                array('offer_url', 'unique', 'className' => 'PostOffer', 'attributeName' => 'url', 'on' => 'create'),
                array('offer_alias', 'unique', 'className' => 'PostOffer', 'attributeName' => 'alias', 'on' => 'create'),

                array('offer_name, offer_summary, offer_provider, offer_url, offer_alias', 'length', 'max'=>255),
                array('offer_price, offer_price_old, offer_bonus_percent', 'numerical', 'integerOnly'=>true),
                array('offer_rating', 'numerical'),
                
                array('image_file', 'file', 'allowEmpty' => true),
                array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

                array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
                array('upload_method', 'checkUpload', 'on' => 'create'),  

                array('created, post_fb, post_twitter', 'safe'), 
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, title, alias, desc, content, cat_id, user_id, created, status', 'safe', 'on'=>'search'),
            );
        }

        public function checkUpload($attribute, $params)
        {
            $post = $_POST['Post'];

            $uv = new CUrlValidator;
            $urlValidate = $uv->validateValue($post['image_url']);

            if($post['upload_method'] == 'url'){
                $size = getimagesize($post['image_url']);
                if(!$post['image_url'] || ($post['image_url'] && !$urlValidate) || !$size){
                    $this->addError('upload_method', 'Đường dẫn URl ảnh phải đúng định dạng');
                }               
            } elseif($post['upload_method'] == 'file' && !$_FILES['browse_file']['size']){
                $this->addError('upload_method', 'Bạn cần chọn 1 ảnh để upload');
            }
        }


        /**
        * @return array relational rules.
        */
        public function relations()
        {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                'manager' => array(self::BELONGS_TO, 'Manager', 'manager_id'),
                'postOffer' => array(self::HAS_ONE, 'PostOffer', 'id'),
                'cat' => array(self::BELONGS_TO, 'PostCat', 'cat_id'),
                'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                'paragraphs' => array(self::HAS_MANY, 'PostParagraph', 'post_id'),
            );
        }

        /**
        * @return array customized attribute labels (name=>label)
        */
        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'title' => Yii::t('app', 'Title'),
                'desc' => Yii::t('app', 'Description'),
                'content' => Yii::t('app', 'Content'),
                'cat_id' => Yii::t('app', 'category'),            
                'user_id' => Yii::t('app', 'User'),
                'source' => Yii::t('app', 'Source'),
                'created' => Yii::t('app', 'Created'),
                'status' => Yii::t('app', 'Status'),
                'manager_id' => Yii::t('app', 'Manager'),

                'offer_name' => Yii::t('app', 'Product Name'),
                'offer_summary' => Yii::t('app', 'Summary'),
                'offer_provider' => Yii::t('app', 'Provider'),
                'offer_price' => Yii::t('app', 'Price'),
                'offer_price_old' => Yii::t('app', 'Old price'),
                'offer_bonus_percent' => Yii::t('app', 'Bonus percent'),
                'offer_url' => Yii::t('app', 'Affiliate Url'),
                'offer_alias' => Yii::t('app', 'Url Name'),
                'offer_rating' => Yii::t('app', 'Manager Rating'),

            );
        }



        /**
        * Retrieves a list of models based on the current search/filter conditions.
        * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
        */
        public function search()
        {
            // Warning: Please modify the following code to remove attributes that
            // should not be searched.

            $criteria=new CDbCriteria;
            $criteria->with = array('postOffer');
            //$criteria->together = true;

            $sort = Yii::app()->request->getQuery('Post_sort');

            if(!$sort && $sort != 'id') $criteria->order = 't.id DESC'; 
            $criteria->compare('id',$this->id,true);
            $criteria->compare('title',$this->title,true);
            $criteria->compare('desc',$this->desc,true);
            $criteria->compare('content',$this->content,true);
            $criteria->compare('cat_id',$this->cat_id,true);
            $criteria->compare('created',$this->created,true);
            $criteria->compare('status',$this->status,true);
            $criteria->compare('manager_id',$this->manager_id,true);

            if($this->postOffer)
                $criteria->compare('postOffer.rating',$this->postOffer->rating,true);

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            ));

            return $dataProvider;
        }

        public function getStatusData(){
            return array(
                'PUBLISH' => Yii::t('app', 'Publish'),
                'PENDING' => Yii::t('app', 'Pending'),
                'DISABLE' => Yii::t('app', 'Disable'),
            );
        }

        public function getStatusLabel(){
            return $this->statusData[$this->status];
        }


        public function getUrlID(){
            return Yii::app()->createAbsoluteUrl('/post/view', array('id' => $this->id));
        }
        public function getUrlEdit(){
            return Yii::app()->createAbsoluteUrl('/admin/post/update', array('id' => $this->id)); 
        }
        public function getUrl(){
            $params = array('alias' => $this->alias);
            if($this->cat_id) $params = $params + array('cat_alias' => $this->cat->alias);

            return Yii::app()->createAbsoluteUrl('/post/view', $params); 
        }
        public function getAdminUrl($type = 'view') {
            return Yii::app()->createUrl('/admin/post/' . $type, array("id" => $this->id));
        }

        public function getImageUrl($type = 'medium', $getPath = FALSE){ // large, medium, small
            $imgConf = Yii::app()->params->post_img;
            if($getPath){
                return $imgConf['path'].$this->id."/{$this->image}_{$type}.jpg"; 
            }
            return Yii::app()->controller->baseUrl.'/'.$imgConf['path'].$this->id."/{$this->image}_{$type}.jpg";
        }
        public function getImageUrlSmall(){
            return $this->getImageUrl('small');
        }

        public function getImageUrlMedium(){
            return $this->getImageUrl('medium');
        }

        public function getCreatedTime(){
            return MyDateTime::relative($this->created);
        }
        public function getTitleEncode(){
            return CHtml::encode($this->title);
        }

        public function getContentShort($words = 50 , $inline = FALSE){
            $content = strip_tags($this->content);
            $content = str_replace('&nbsp;', ' ', $content);
            if($inline) $content = preg_replace('{[\n\s]+}', ' ', $content);
            return Myext::word_limiter(trim($content), $words);
        } 

        private $_newerPost;
        public function getNewerPost(){
            if($this->_newerPost) return $this->_newerPost;
            return $this->_newerPost = $this->with('cat')->find(new CDbCriteria(array(
                'condition' => "t.id > {$this->id} AND t.`status` = 'PUBLISH'",
                'order' => 't.id ASC',
            )));
        }

        private $_olderPost;
        public function getOlderPost(){
            if($this->_olderPost) return $this->_olderPost;
            return $this->_olderPost = $this->with('cat')->find(new CDbCriteria(array(
                'condition' => "t.id < {$this->id} AND t.`status` = 'PUBLISH'",
                'order' => 't.id DESC',
            )));
        }

        public function getParagraphStr(){
            if(!$this->paragraphs) return NULL;

            $p_titles = array();
            $p_contents = array();
            foreach($this->paragraphs as $p){
                $p_titles[] = $p->title;
                $p_contents[] = $p->content;
            }

            return array(
                'title' => implode(' ', $p_titles),
                'content' => implode(' ', $p_contents),
            );
        }

        public function getPost_id(){
            return $this->id;
        }

        public function getCatUrl(){
            return $this->cat->url;
        }
        public function getCatName(){
            return $this->cat->name;
        }
        public function getManagerName(){
            return $this->manager->name;
        }
                
        public function getCreatedDate(){
            return date('Y-m-d', strtotime($this->created));
        }
        
        private function replaceCallback($matches){
            $autoplay = $matches[1] == "play" ? 'true' : 'false';
            return "<div class=\"video-player\" autostart=\"{$autoplay}\" url=\"{$matches[2]}\">Video Loading ...</div>";
        }
        
        private function parseVideo($content){
            //[video]http://totalhairregrowth.com/jwplayer/thrvid.flv[/video]
            //<div class="video-player" url="http://totalhairregrowth.com/jwplayer/thrvid.flv">Video Loading ...</div> 
//            return preg_replace(
//            '{\[video\ play](.+)\[\/video\]}', 
//            '<div class="video-player" url="$1">Video Loading ...</div>', 
//            $content);
            return preg_replace_callback(
                    '{\[video(?:\s+(play))?\](.+)\[\/video\]}', 
                    'self::replaceCallback',
                    $content
            );  

        }
        
        
        public function detectVideo(){
            $contentHasVideo = preg_match('{\[video\](.+)\[\/video\]}', $this->content);
            if($contentHasVideo){
                $this->content = $this->parseVideo($this->content);
            }
            
            $pHasVideo = FALSE;
            if($this->paragraphs){
                foreach($this->paragraphs as $p){
                    $pHasVideo = preg_match('{\[video\](.+)\[\/video\]}', $p->content);
                    if($pHasVideo){
                        $p->content = $this->parseVideo($p->content);
                        $pHasVideo = TRUE;
                    }
                }
            }
            
            $hasVideo = $contentHasVideo || $pHasVideo;
            return $hasVideo;
        }


        public function reIndex(){
            //            return null;
            set_time_limit(99999);
            Yii::import('application.vendors.*');
            require_once('Zend/Search/Lucene.php');
            $indexPath = 'application.runtime.search.post';

            Yii::import('ext.TextParser');  
            $index = new Zend_Search_Lucene(Yii::getPathOfAlias($indexPath), true);
            Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());

            $currentTime = MyDateTime::getCurrentTime();
            $posts = Post::model()->findAll("`status` = 'PUBLISH' && t.`created` < '{$currentTime}'");

            foreach($posts as $post){
                $doc = new Zend_Search_Lucene_Document();
                $doc->addField(Zend_Search_Lucene_Field::UnIndexed('post_id', $post->id));

                $doc->addField(Zend_Search_Lucene_Field::text('title', CHtml::encode($post->title), 'utf-8'));
//                $doc->addField(Zend_Search_Lucene_Field::text('p_title', CHtml::encode($post->paragraphStr['title']), 'utf-8'));
//                $doc->addField(Zend_Search_Lucene_Field::text('desc', CHtml::encode($post->desc), 'utf-8'));
//                $doc->addField(Zend_Search_Lucene_Field::text('content', CHtml::encode($post->content), 'utf-8'));
//                $doc->addField(Zend_Search_Lucene_Field::text('p_content', CHtml::encode($post->paragraphStr['content']), 'utf-8'));

                $doc->addField(Zend_Search_Lucene_Field::unIndexed('url', $post->url));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('titleEncode', $post->titleEncode, 'utf-8'));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('createdTime', $post->createdTime));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('catUrl', $post->catUrl));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('catName', $post->catName, 'utf-8'));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('managerName', $post->managerName, 'utf-8'));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('fb_comment_count', $post->fb_comment_count));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('contentShort', $post->contentShort, 'utf-8'));
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('imageUrlSmall', $post->imageUrlSmall, 'utf-8'));

                $index->addDocument($doc);
            }
            $index->commit();
        }

        
        public function fulltextSearch($term, $limit = 5){
            $term = preg_replace('{[-+\s\/]+}', ' ', $term);

            Yii::import('application.vendors.*');
            require_once('Zend/Search/Lucene.php');
            $indexPath = 'application.runtime.search.post';

            Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8Num_CaseInsensitive());
            Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('UTF-8');
            Zend_Search_Lucene::setResultSetLimit($limit);

            $index = new Zend_Search_Lucene(Yii::getPathOfAlias($indexPath));

            return $index->find($term 
//                ,'title', SORT_STRING, SORT_DESC
//                ,'p_title', SORT_STRING, SORT_DESC   
//                ,'desc', SORT_STRING, SORT_DESC
//                ,'content', SORT_STRING, SORT_DESC
//                ,'p_content', SORT_STRING, SORT_DESC  
            );
        }

        public function beforeSave(){

            if(parent::beforeSave())
            {
                //$parser=new CHtmlPurifier();         
                //$this->content=$parser->purify($this->content);
                $this->desc = trim(strip_tags($this->desc));  
            }
            return true;
        }

        public function submitSitemap(){
            $siteMap = Yii::app()->createAbsoluteUrl('/sitemap');
            $searchEngines = array(
                "http://www.google.com/webmasters/sitemaps/ping?sitemap={$siteMap}",
                "http://www.bing.com/webmaster/ping.aspx?siteMap={$siteMap}",
            );
            foreach($searchEngines as $s){
                @file_get_contents($s); 
            }
        }


        public function postFacebook(){
            $fbAppId = '407318279316710';
            $fbAppSecret = '15cd0fc5647cb9573d971b1faea6dcc0';  //https://graph.facebook.com/bluehealthbook
            $fbPageId = '462312840468261';

            Yii::import('ext.facebook.src.Facebook');
            $fb = new Facebook(array(
                'appId'  => $fbAppId,
                'secret' => $fbAppSecret,
            ));

            $fb_id = $fb->getUser();
            if(!$fb_id){
                $fbLoginUrl = $fb->getLoginUrl(array(
                    'scope' => 'publish_stream,manage_pages',
                    'redirect_uri' => $this->baseUrl.Yii::app()->request->requestUri,
                ));
                Yii::app()->controller->redirect($fbLoginUrl);
            }

            // check manage page
            $pages = $fb->api(array(
                'method' => 'fql.query', 
                'query' => "SELECT page_id, name, page_url FROM page WHERE page_id = {$fbPageId}")
            );
            if(!$pages) return;

            // posts message on page feed
            $msg_body = array(
                'message' => $this->getContentShort(80) ."\n\nSee details at the link below ↓",
                'name' => $this->title,
                'link' => $this->url,
                'caption' => $this->cat->name,
                'description' => $this->desc,
                'picture' => $this->imageUrlSmall,
                'actions' => array(
                    array(
                        'name' => Yii::app()->controller->siteName,
                        'link' => $this->baseUrl
                    )
                )
            );

            //posts message on page statues
            /*
            $msg_body = array(
            'source' => '@'.realpath('myphoto/somephot.gif'),
            'message' => 'message for my wall',
            'published' => 'false', //Keep photo unpublished
            'scheduled_publish_time' => '1333699439' //Or time when post should be published
            );
            */
            $postResult = $fb->api("/{$fbPageId}/feed", 'post', $msg_body );
        }


        public function postTwitter(){
            Yii::import('ext.TwitterOAuth.*');
            $tmhOAuth = new tmhOAuth(array(
                'consumer_key'      =>  'YCOVbNLMg2uukB4Qm22JSw',
                'consumer_secret'   =>  'y3vZcowOns91IvlTgPKBsw7FYCWxeJpghoNKe5jJk0',
                'user_token'        =>  '1114077866-HEUMt3hlvyRUkuIYpfkFmRyeO2jFUwhVeh5m8GF',
                'user_secret'       =>  'PP6sqtx4T1bS3fZVli8DQUHhxneERztv5B4tlUszW8c',
            ));    
            $code = $tmhOAuth->request('GET', $tmhOAuth->url('1/account/verify_credentials'));
            
            $limit = 95;
            $message = Myext::char_limiter($this->title.' '. $this->desc, $limit);
            $post = array(
                'status' => $message.' '.$this->url, 
                'lat' => '40.722803', 
                'long' => '-73.988514',
            );

            $image = $this->getImageUrl('small', TRUE);
            if(file_exists($image)){
                $post['media[]'] = "@{$image}"; 
            }
            $code = $tmhOAuth->request(
                'POST',
                'https://api.twitter.com/1.1/statuses/update_with_media.json',
                $post,
                true, // use auth
                true // multipart
            );
            return $code;
        }

        public function googleLogin(){
            $googleClientID = '381035255238-o818q9ni7et6ajsb49l3jnv9cngrtbeo.apps.googleusercontent.com';
            $googleClientSecret = 'Dnde4qwZ3ienPRpnEf65DOhR';
            $googleRedirectUri = 'http://bluehealthbook.com/admin?test';
            $googleDevKey = 'AIzaSyBdDljiD95KK-HkgnvTte-Nj76gwbNH0uM';

            Yii::import('ext.Google_Client.Google_Client');
            Yii::import('ext.Google_Client.contrib.Google_PlusService');

            $client = new Google_Client();
            $client->setApplicationName("Google+ OAuth2");
            $client->setClientId($googleClientID);
            $client->setClientSecret($googleClientSecret);
            $client->setRedirectUri($googleRedirectUri);
            $client->setDeveloperKey($googleDevKey);

            $plus = new Google_PlusService($client);

            if (isset($_GET['code'])) {
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
                header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
            }

            if (isset($_SESSION['access_token'])) {
                $client->setAccessToken($_SESSION['access_token']);
            }

            if (!$client->getAccessToken()) {
                $authUrl = $client->createAuthUrl(); 
                $this->redirect($authUrl);  
            }

            // The access token may have been updated lazily.
            $_SESSION['access_token'] = $client->getAccessToken();

            $me = $plus->people->get('me');
            // These fields are currently filtered through the PHP sanitize filters.
            // See http://www.php.net/manual/en/filter.filters.sanitize.php
            $url = filter_var($me['url'], FILTER_VALIDATE_URL);
            $img = filter_var($me['image']['url'], FILTER_VALIDATE_URL);
            $name = filter_var($me['displayName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $personMarkup = "<a rel='me' href='$url'>$name</a><div><img src='$img'></div>";


            $optParams = array('maxResults' => 100);
            $activities = $plus->activities->listActivities('me', 'public', $optParams);
            $activityMarkup = '';
            foreach($activities['items'] as $activity) {
                // These fields are currently filtered through the PHP sanitize filters.
                // See http://www.php.net/manual/en/filter.filters.sanitize.php
                $url = filter_var($activity['url'], FILTER_VALIDATE_URL);
                $title = filter_var($activity['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $content = filter_var($activity['object']['content'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $activityMarkup .= "<div class='activity'><a href='$url'>$title</a><div>$content</div></div>";
            }




        }

}