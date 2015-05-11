<?php

/**
 * This is the model class for table "pt".
 *
 * The followings are the available columns in table 'pt':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $desc
 * @property integer $viewed
 * @property integer $topic_id
 * @property integer $created
 * @property string $image
 */
class Pt extends CActiveRecord
{
    public $upload_method = 'file';
    public $image_file;
    public $image_url;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pt the static model class
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
		return 'pt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('viewed, topic_id, created', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>500),
			array('desc', 'length', 'max'=>1000),
			array('image', 'length', 'max'=>255),
            array('type', 'length', 'max'=>1),
            array('content', 'safe'),

            array('image_file', 'file', 'allowEmpty' => true),
            array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

            array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
            array('upload_method', 'checkUpload', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, desc, viewed, topic_id, created, image, type', 'safe', 'on'=>'search'),
		);
	}

    public function checkUpload($attribute, $params)
    {
        $post = $_POST['Pt'];

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
            'topic' => array(self::BELONGS_TO, 'TopicPt', 'topic_id'),
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
			'desc' => 'Mô tả ngăn',
			'content' => 'Nội dung',
			'viewed' => 'Viewed',
			'topic_id' => 'Thuộc chủ đề',
			'created' => 'Created',
			'image' => 'Ảnh đại diện',
			'type' => 'Thuộc chuyên mục',
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
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function getImageUrl($id = null, $size = '260'){
        $id = $id ? $id : $this->id;

        $imgConf = Yii::app()->params->pt;
        $contentPath = $imgConf['path']."{$id}/".$size.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath;
    }
//1. Tu van phong thuy. 2. Mach ban
    public function getTypeData(){
        return array(
            '1' => 'Tư vấn phong thủy',
            '2' => 'Mách bạn'
        );
    }

    public function getTypeLabel(){
        return $this->typeData[$this->type];
    }

    public function getAliasTypeData(){
        return array(
            '1' => 'tu-van-phong-thuy',
            '2' => 'mach-ban',
        );
    }

    public function getAliasTypeLabel(){
        return $this->aliasTypeData[$this->type];
    }

    public function getUrl($id = 0, $alias = null){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;

        return Yii::app()->createUrl('/web/pt/detail', array('alias'=>$alias,'id' => $id));
    }
}