<?php

/**
 * This is the model class for table "bds_sale".
 *
 * The followings are the available columns in table 'bds_sale':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $location
 * @property string $dist_id
 * @property string $province_id
 * @property string $ward_id
 * @property integer $price
 * @property string $price_type
 * @property string $area
 * @property string $content
 * @property integer $created
 * @property string $address
 * @property string $code
 * @property string $type
 * @property integer $date_start
 * @property integer $date_end
 * @property integer $floor
 * @property integer $room
 * @property integer $befor
 * @property integer $way
 * @property integer $toilet
 * @property string $furniture
 * @property string $name_contact
 * @property string $address_contact
 * @property string $phone_contact
 * @property string $email_contact
 * @property string $status
 */
class BdsSale extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BdsSale the static model class
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
		return 'bds_sale';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, project_id, dist_id, price, price_type, area, created, code', 'required'),
			array('created, date_start, date_end, floor, room, befor, way, toilet, project_id', 'numerical', 'integerOnly'=>true),
			array('title, project_name, alias, address, furniture, address_contact', 'length', 'max'=>500),
			array('dist_id, province_id, ward_id', 'length', 'max'=>10),
			array('price, price_type, code, name_contact, phone_contact, email_contact', 'length', 'max'=>100),
			array('area, image', 'length', 'max'=>250),
			array('type', 'length', 'max'=>1),
			array('status', 'length', 'max'=>7),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, location, dist_id, province_id, ward_id, price, price_type, area, content, created, address, code, type, date_start, date_end, floor, room, befor, way, toilet, furniture, name_contact, address_contact, phone_contact, email_contact, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'imagesProducts' => array(self::HAS_MANY, 'ImagesSale', 'bds_sale_id'),
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
			'project_id' => 'Thuộc dự án',
			'dist_id' => 'Dist',
			'province_id' => 'Province',
			'ward_id' => 'Ward',
			'price' => 'Price',
			'price_type' => 'Price Type',
			'area' => 'Area',
			'content' => 'Content',
			'created' => 'Created',
			'address' => 'Address',
			'code' => 'Code',
			'type' => 'Type',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
			'floor' => 'Floor',
			'room' => 'Room',
			'befor' => 'Befor',
			'way' => 'Way',
			'toilet' => 'Toilet',
			'furniture' => 'Furniture',
			'name_contact' => 'Name Contact',
			'address_contact' => 'Address Contact',
			'phone_contact' => 'Phone Contact',
			'email_contact' => 'Email Contact',
			'status' => 'Status',
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
		$criteria->compare('location',$this->location,true);
		$criteria->compare('dist_id',$this->dist_id,true);
		$criteria->compare('province_id',$this->province_id,true);
		$criteria->compare('ward_id',$this->ward_id,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('price_type',$this->price_type,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('date_start',$this->date_start);
		$criteria->compare('date_end',$this->date_end);
		$criteria->compare('floor',$this->floor);
		$criteria->compare('room',$this->room);
		$criteria->compare('befor',$this->befor);
		$criteria->compare('way',$this->way);
		$criteria->compare('toilet',$this->toilet);
		$criteria->compare('furniture',$this->furniture,true);
		$criteria->compare('name_contact',$this->name_contact,true);
		$criteria->compare('address_contact',$this->address_contact,true);
		$criteria->compare('phone_contact',$this->phone_contact,true);
		$criteria->compare('email_contact',$this->email_contact,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getStatusData(){
        return array(
            'ENABLE' => 'Hiển thị',
            'DISABLE' => 'Ẩn',
            'PENDING' => 'Chờ duyệt'
        );
    }
    public function getStatusLabel(){
        return $this->statusData[$this->status];
    }

    public function getImageUrl($id = null,$size = '122', $image = null){
        $id = $id ? $id : $this->id;
        $image = $image ? $image : $this->image;
        $imgConf = Yii::app()->params->sale;
        $contentPath = $imgConf['path']."{$id}/{$size}/".$image.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath.'?t='.time();
    }
//1. Ban chung cu. 2. Ban nha rieng. 3. Ban khu lien ke. 4. Cho thue chung cu. 5. Cho thue nha rieng
    public function getTypeData(){
        return array(
            '1' => 'Bán chung cư',
            '2' => 'Bán nhà riêng',
            '3' => 'Bán khu liền kề'
        );
    }

    public function getTypeLabel(){
        return $this->typeData[$this->type];
    }

    public function getAliasTypeData(){
        return array(
            '1' => 'ban-chung-cu',
            '2' => 'ban-nha-rieng',
            '3' => 'ban-khu-lien-ke'
        );
    }

    public function getAliasTypeLabel(){
        return $this->aliasTypeData[$this->type];
    }

    public function getNewSyntax(){
        $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $new_syntax = '';
        $max = count($chars) - 1;

        for($i=0;$i<5;$i++){
            $new_syntax .= $chars[rand(0, $max)];
        }

        if($this->exists("code = '{$new_syntax}'")){
            return $this->getNewSyntax();
        }
        return $new_syntax;
    }

    public function getUrl($id = 0, $alias = null){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;

        return Yii::app()->createUrl('/web/sale/detail', array('alias'=>$alias,'id' => $id));
    }
}