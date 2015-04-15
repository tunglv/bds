<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $id
 * @property string $name
 * @property string $alias
 * @property string $address
 * @property string $mobile
 * @property string $fax
 * @property string $website
 * @property string $email
 * @property string $yahoo
 * @property string $image
 * @property string $type
 * @property string $overview
 * @property string $ha_tang
 * @property string $thiet_ke
 * @property string $location
 * @property string $ban_hang
 * @property string $video
 * @property string $images
 * @property string $chu_dau_tu
 * @property integer $created
 */
class Project extends CActiveRecord
{
    public $upload_method = 'file';
    public $image_file;
    public $image_url;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('created', 'numerical', 'integerOnly'=>true),
			array('name, alias, address, image', 'length', 'max'=>255),
			array('mobile, fax', 'length', 'max'=>15),
			array('website, yahoo', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('type', 'length', 'max'=>1),
			array('overview, ha_tang, thiet_ke, location, ban_hang, video, images, chu_dau_tu', 'safe'),

            array('image_file', 'file', 'allowEmpty' => true),
            array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

            array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
            array('upload_method', 'checkUpload', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, address, mobile, fax, website, email, yahoo, image, type, overview, ha_tang, thiet_ke, location, ban_hang, video, images, chu_dau_tu, created', 'safe', 'on'=>'search'),
		);
	}

    public function checkUpload($attribute, $params)
    {
        $post = $_POST['Project'];

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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'alias' => 'Alias',
			'address' => 'Address',
			'mobile' => 'Mobile',
			'fax' => 'Fax',
			'website' => 'Website',
			'email' => 'Email',
			'yahoo' => 'Yahoo',
			'image' => 'Image',
			'type' => 'Type',
			'overview' => 'Overview',
			'ha_tang' => 'Ha Tang',
			'thiet_ke' => 'Thiet Ke',
			'location' => 'Location',
			'ban_hang' => 'Ban Hang',
			'video' => 'Video',
			'images' => 'Images',
			'chu_dau_tu' => 'Chu Dau Tu',
			'created' => 'Created',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('yahoo',$this->yahoo,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('overview',$this->overview,true);
		$criteria->compare('ha_tang',$this->ha_tang,true);
		$criteria->compare('thiet_ke',$this->thiet_ke,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('ban_hang',$this->ban_hang,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('chu_dau_tu',$this->chu_dau_tu,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

//1: cao oc van phong, 2: khu can ho, 3: khu do thi moi, 4: khu thuong mai dich vu, 5: khu phuc hop, 6: khu dan cu, 7: khu du lich nghi duong, 8: khu cong nghiep, 9: du an khac

    public function getTypeData(){
        return array(
            '1' => 'Cao ốc văn phòng',
            '2' => 'Khu căn hộ',
            '3' => 'Khu đô thị mới',
            '4' => 'Khu thương mại - dịch vụ',
            '5' => 'Khu phức hợp',
            '6' => 'Khu dân cư',
            '7' => 'Khu du lịch - nghỉ dưỡng',
            '8' => 'Khu công nghiệp',
            '9' => 'Dự án khác'
        );
    }

    public function getTypeLabel(){
        return $this->typeData[$this->type];
    }

    public function getUrl($id = 0, $alias = null){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;

        return Yii::app()->createUrl('/web/project/detail', array('alias'=>$alias,'id' => $id));
    }

    public function getImageUrl($id = null, $size = '90'){
        $id = $id ? $id : $this->id;

        $imgConf = Yii::app()->params->project;
        $contentPath = $imgConf['path']."{$id}/".$size.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath;
    }
}