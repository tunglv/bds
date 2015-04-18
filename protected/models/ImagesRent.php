<?php

/**
 * This is the model class for table "images_rent".
 *
 * The followings are the available columns in table 'images_rent':
 * @property string $id
 * @property string $image
 * @property integer $bds_rent_id
 * @property integer $is_cover
 */
class ImagesRent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImagesRent the static model class
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
		return 'images_rent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, bds_rent_id', 'required'),
			array('bds_rent_id, is_cover', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, bds_rent_id, is_cover', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'bds_rent_id' => 'Bds Rent',
			'is_cover' => 'Is Cover',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('bds_rent_id',$this->bds_rent_id);
		$criteria->compare('is_cover',$this->is_cover);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function unlinkImage(){
        $img_cnf = Yii::app()->params['rent'];
        $path = "{$img_cnf['path']}/{$this->id}/";
        //xóa ảnh thumb
        foreach($img_cnf['img'] as $folder => $imgInfo){
            $thumbPath = $path.$folder.'/'.$this->image.'.jpg';
            if(file_exists($thumbPath)) unlink($thumbPath);
        }
    }

    public function createThumb($imgPath, $savedPath, $imgConf, $fileName = ''){
        // upload image type
        $imgPathInfo = pathinfo($imgPath);
        Yii::import('ext.wideimage.lib.WideImage');
        $imgObj = WideImage::load($imgPath);
        if(!$fileName) $fileName = $imgPathInfo['filename'];
        if(!file_exists($savedPath)) mkdir($savedPath,0777,true);

        foreach($imgConf['img'] as $folder => $imgInfo){
            $savedPathType = $savedPath.$folder.'/';
            Myext::createDir($savedPathType);

            $imgObj = $imgObj->resize($imgInfo['width'], $imgInfo['height'], $imgInfo['fix'], 'down');
            $imgObj = $imgObj->resizeCanvas($imgInfo['width'], $imgInfo['height'],'center','center', null, 'down');

            $imgObj->saveToFile($savedPathType.$fileName.'.jpg', $imgInfo['quality']);
        }

        // delete image in temp
        unlink($imgPath);
        return $fileName;
    }

    public function getIsCover() {
        return $this->is_cover == 1;
    }

    public function getUrl($type = '122', $product_id = NULL, $image = NULL){
        $img_cnf = Yii::app()->params['rent'];
        $image = $image ? $image : $this->image;

        $product_id = $product_id ? $product_id : $this->bds_sale_id;

        // detect image on local
        $imagePath = "{$img_cnf['path']}/{$product_id}/{$type}/{$image}.jpg";
        return Yii::app()->getBaseUrl(true)."/{$imagePath}";

    }
}