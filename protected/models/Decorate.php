<?php

/**
 * This is the model class for table "decorate".
 *
 * The followings are the available columns in table 'decorate':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $desc
 * @property string $content
 * @property integer $topic_id
 * @property integer $created
 * @property string $type
 * @property string $image
 */
class Decorate extends CActiveRecord
{
    public $upload_method = 'file';
    public $image_file;
    public $image_url;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Decorate the static model class
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
		return 'decorate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, desc', 'required'),
			array('topic_id, created, viewed', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>500),
			array('desc', 'length', 'max'=>1000),
			array('type', 'length', 'max'=>1),
			array('image', 'length', 'max'=>255),
			array('content', 'safe'),

            array('image_file', 'file', 'allowEmpty' => true),
            array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

            array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
            array('upload_method', 'checkUpload', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, desc, content, topic_id, created, type, image', 'safe', 'on'=>'search'),
		);
	}

    public function checkUpload($attribute, $params)
    {
        $post = $_POST['Decorate'];

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
            'topic' => array(self::BELONGS_TO, 'TopicDecorate', 'topic_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'alias' => 'Alias',
			'desc' => 'Desc',
			'content' => 'Content',
			'topic_id' => 'Topic',
			'created' => 'Created',
			'type' => 'Type',
			'image' => 'Image',
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
		$criteria->compare('created',$this->created);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getImageUrl($id = null, $size = '260'){
        $id = $id ? $id : $this->id;

        $imgConf = Yii::app()->params->decorate;
        $contentPath = $imgConf['path']."{$id}/".$size.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath;
    }
//1. Ngoai that. 2.Noi that. 3. Mach ban. 4. Tu van noi ngoai that
    public function getTypeData(){
        return array(
            '1' => 'Ngoại thất',
            '2' => 'Nội thất',
            '3' => 'Mách bạn',
            '4' => 'Tư vấn Nội - Ngoại thất'
        );
    }

    public function getTypeLabel(){
        return $this->typeData[$this->type];
    }

    public function getAliasTypeData(){
        return array(
            '1' => 'ngoai-that',
            '2' => 'noi-that',
            '3' => 'mach-ban',
            '4' => 'tu-van-noi-ngoai-that',
        );
    }

    public function getAliasTypeLabel(){
        return $this->aliasTypeData[$this->type];
    }

    public function getUrl($id = 0, $alias = null){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;

        return Yii::app()->createUrl('/web/decorate/detail', array('alias'=>$alias,'id' => $id));
    }
}