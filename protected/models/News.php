<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $title
 * @property string $desc
 * @property string $content
 * @property integer $topic_id
 * @property integer $viewed
 * @property integer $created
 * @property string $type
 * @property string $images
 */
class News extends CActiveRecord
{
    public $upload_method = 'file';
    public $image_file;
    public $image_url;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, desc, topic_id', 'required'),
			array('topic_id, viewed, created, project_id', 'numerical', 'integerOnly'=>true),
			array('title, image, alias', 'length', 'max'=>500),
			array('desc', 'length', 'max'=>1000),
			array('type', 'length', 'max'=>1),
			array('content', 'safe'),

            array('image_file', 'file', 'allowEmpty' => true),
            array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

            array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
            array('upload_method', 'checkUpload', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, desc, content, topic_id, viewed, created, type, image, alias, project_id', 'safe', 'on'=>'search'),
		);
	}

    public function checkUpload($attribute, $params)
    {
        $post = $_POST['News'];

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
            'topic' => array(self::BELONGS_TO, 'TopicNews', 'topic_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Tiêu đề',
			'alias' => 'Alias',
			'desc' => 'Mô tả ngắn',
			'content' => 'Nội dung',
			'topic_id' => 'Thuộc chủ đề',
			'viewed' => 'Viewed',
			'created' => 'Created',
			'type' => 'Thuộc chuyên mục',
			'image' => 'Ảnh đại diện',
            'project_id' => 'Thuộc dự án'
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('created',$this->created);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('image',$this->images,true);
		$criteria->compare('project_id',$this->project_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getImageUrl($id = null, $size = '260'){
        $id = $id ? $id : $this->id;

        $imgConf = Yii::app()->params->news;
        $contentPath = $imgConf['path']."{$id}/".$size.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath;
    }
//1. Tin tuc thi truong. 2.Chinh sach -  quản lý. 3. Thong tin quy hoach
    public function getTypeData(){
        return array(
            '1' => 'Tin tức thị trường',
            '2' => 'Chính sách - quản lý',
            '3' => 'Thông tin quy hoạch'
        );
    }

    public function getTypeLabel(){
        return $this->typeData[$this->type];
    }

    public function getAliasTypeData(){
        return array(
            '1' => 'tin-tuc-thi-truong',
            '2' => 'chinh-sach-quan-ly',
            '3' => 'thong-tin-quy-hoach'
        );
    }

    public function getAliasTypeLabel(){
        return $this->aliasTypeData[$this->type];
    }

    public function getUrl($id = 0, $alias = null){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;

        return Yii::app()->createUrl('/web/news/detail', array('alias'=>$alias,'id' => $id));
    }
}