<?php

/**
 * This is the model class for table "saler".
 *
 * The followings are the available columns in table 'saler':
 * @property string $id
 * @property string $name
 * @property string $alias
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $website
 * @property string $fax
 * @property string $MST
 * @property string $skyper
 * @property string $yahoo
 * @property string $image
 * @property integer $province_id
 * @property integer $district_id
 * @property integer $ward_id
 * @property string $area
 * @property integer $created
 */
class Saler extends CActiveRecord
{
    public $upload_method = 'file';
    public $image_file;
    public $image_url;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Saler the static model class
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
		return 'saler';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, image', 'required'),
			array('created', 'numerical', 'integerOnly'=>true),
			array('name, alias, image', 'length', 'max'=>255),
			array('address', 'length', 'max'=>500),
			array('phone, MST', 'length', 'max'=>15),
			array('mobile', 'length', 'max'=>11),
			array('email, website, fax', 'length', 'max'=>50),
			array('skyper, yahoo', 'length', 'max'=>25),
			array('province_id, district_id, ward_id', 'length', 'max'=>25),
			array('area', 'length', 'max'=>2000),
            array('content', 'safe'),

            array('image_file', 'file', 'allowEmpty' => true),
            array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

            array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
            array('upload_method', 'checkUpload', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, address, phone, mobile, email, website, fax, MST, skyper, yahoo, image, province_id, district_id, ward_id, area, created', 'safe', 'on'=>'search'),
		);
	}


    public function checkUpload($attribute, $params)
    {
        $post = $_POST['Saler'];

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
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'email' => 'Email',
			'website' => 'Website',
			'fax' => 'Fax',
			'MST' => 'Mst',
			'skyper' => 'Skyper',
			'yahoo' => 'Yahoo',
			'image' => 'Image',
			'province_id' => 'Province',
			'district_id' => 'District',
			'ward_id' => 'Ward',
			'area' => 'Area',
			'created' => 'Created',
            'content' => 'Giới thiệu công ty'
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
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('MST',$this->MST,true);
		$criteria->compare('skyper',$this->skyper,true);
		$criteria->compare('yahoo',$this->yahoo,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('ward_id',$this->ward_id);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getImageUrl($id = null, $size = '200'){
        $id = $id ? $id : $this->id;

        $imgConf = Yii::app()->params->saler;
        $contentPath = $imgConf['path']."{$id}/".$size.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath;
    }

    public function getUrl($id = 0, $alias = null){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;

        return Yii::app()->createUrl('/web/saler/detail', array('alias'=>$alias,'id' => $id));
    }
}