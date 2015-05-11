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
 * @property string $bang_gia
 * @property string $thiet_ke
 * @property string $tien_do_thanh_toan
 * @property string $hop_dong
 * @property string $uu_dai
 * @property string $ho_tro_vay_von
 * @property string $tien_do
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
			array('created, viewed, saler_id, is_home', 'numerical', 'integerOnly'=>true),
			array('name, alias, address, image, province_name, district_name, ward_name', 'length', 'max'=>255),
			array('mobile, fax', 'length', 'max'=>15),
			array('province_id, district_id', 'length', 'max'=>5),
			array('ward_id', 'length', 'max'=>10),
			array('website, yahoo', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('type', 'length', 'max'=>1),
			array('overview, bang_gia, thiet_ke, tien_do_thanh_toan, uu_dai, ho_tro_vay_von, tien_do, chu_dau_tu, hop_dong', 'safe'),

            array('image_file', 'file', 'allowEmpty' => true),
            array('image_file', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),

            array('image_url', 'url', 'allowEmpty' => true, 'on' => 'update'),
            array('upload_method', 'checkUpload', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias, address, mobile, fax, is_home, website, email, yahoo, image, type, overview, bang_gia, thiet_ke, tien_do_thanh_toan, hop_dong, uu_dai, ho_tro_vay_von, tien_do, chu_dau_tu, created', 'safe', 'on'=>'search'),
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
            'project' => array(self::BELONGS_TO, 'Saler', 'saler_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên dự án',
			'alias' => 'Alias',
			'address' => 'Địa chỉ',
			'mobile' => 'Số điện thoại',
			'fax' => 'Fax',
			'website' => 'Website',
			'email' => 'Email',
			'yahoo' => 'Yahoo',
			'image' => 'Ảnh đại diện',
			'type' => 'Thuộc loại hình',
			'overview' => 'Giới thiệu chung',
			'bang_gia' => 'Bảng giá',
			'thiet_ke' => 'Mặt bằng và thiết kế',
			'tien_do_thanh_toan' => 'Tiến độ thanh toán',
            'hop_dong'=>'Hợp đồng',
			'uu_dai' => 'Ưu đãi',
			'ho_tro_vay_von' => 'Hỗ trợ vay vốn ngân hàng',
			'tien_do' => 'Tiến độ thi công',
			'chu_dau_tu' => 'Chủ đầu tư',
			'created' => 'Created',
            'saler_id' => 'Saler',
            'is_home' => 'Hiển thị trang chủ',
            'district_id' => 'Quận/huyện',
            'province_id' => 'Tỉnh/Tp',
            'ward_id' => 'Phường/Xã',
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
		$criteria->compare('bang_gia',$this->bang_gia,true);
		$criteria->compare('thiet_ke',$this->thiet_ke,true);
		$criteria->compare('tien_do_thanh_toan',$this->tien_do_thanh_toan,true);
		$criteria->compare('hop_dong',$this->hop_dong,true);
		$criteria->compare('uu_dai',$this->uu_dai,true);
		$criteria->compare('ho_tro_vay_von',$this->ho_tro_vay_von,true);
		$criteria->compare('tien_do',$this->tien_do,true);
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

    public function getIsHomeData(){
        return array(
            '0' => 'Không hiển thị trang chủ',
            '1' => 'Hiển thị trang chủ'
        );
    }
    public function getIsHomeLabel(){
        return $this->isHomeData[$this->is_home];
    }

    public function getAliasTypeData(){
        return array(
            '1' => 'cao-oc-van-phong',
            '2' => 'khu-can-ho',
            '3' => 'khu-do-thi-moi',
            '4' => 'khu-thuong-mai-dich-vu',
            '5' => 'khu-phuc-hop',
            '6' => 'khu-dan-cu',
            '7' => 'khu-du-lich-nghi-duong',
            '8' => 'khu-cong-nghiep',
            '9' => 'du-an-khac'
        );
    }

    public function getAliasTypeLabel($type = null){
        $type = $type ? $type : $this->type;
        return $this->aliasTypeData[$type];
    }

    public function getUrl($id = 0, $alias = null, $type = ''){
        $alias = $alias ? $alias : $this->alias;
        $id = $id ? $id : $this->id;
        $type = $type ? $type : $this->aliasTypeLabel;

        return Yii::app()->createUrl('/web/project/detail', array('type'=>$type, 'alias'=>$alias,'id' => $id));
    }

    public function getCUrl($type = '', $province_name = '', $province_id = ''){
        $type = $type ? $type : $this->type;
        $province_name = $province_name ? $province_name : $this->province_name;
        $province_id = $province_id ? $province_id : $this->province_id;

        $alias = $this->getAliasTypeLabel($type);

        Yii::import('ext.TextParser');
        $province_alias = TextParser::toSEOString($province_name);

        return Yii::app()->createUrl('/web/project/listC', array('alias'=>$alias, 'city'=>$province_alias,'cid' => $province_id));
    }

    public function getImageUrl($id = null, $size = '90'){
        $id = $id ? $id : $this->id;

        $imgConf = Yii::app()->params->project;
        $contentPath = $imgConf['path']."{$id}/".$size.'.jpg';
        return Yii::app()->getBaseUrl(TRUE).'/'.$contentPath;
    }

    public function getAll($district_id = null, $ward_id = null){
        if($district_id){
            $criteria = new CDbCriteria();
            $criteria->compare('t.district_id', $district_id);

            $data = Project::model()->findAll($criteria);
        }else if($ward_id) {
            $criteria = new CDbCriteria();
            $criteria->compare('t.ward_id', $ward_id);

            $data = Project::model()->findAll($criteria);
        }else{
            $data = Project::model()->findAll();
        }

        return $data;
    }

    public function getData($district_id = null, $ward_id = null){
        return CHtml::listData($this->getAll($district_id, $ward_id), 'id', 'name');
    }

    public function getUrlList($type = null){
        $type = $type ? $type : $this->type;

        $alias = $this->getAliasTypeLabel($type);

        return Yii::app()->createUrl('/web/project/list', array('alias'=>$alias));
    }
}