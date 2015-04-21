<?php

/**
 * This is the model class for table "ward".
 *
 * The followings are the available columns in table 'ward':
 * @property string $wardid
 * @property string $name
 * @property string $type
 * @property string $location
 * @property string $districtid
 */
class Ward extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ward the static model class
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
		return 'ward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wardid, name, type, location, districtid', 'required'),
			array('wardid, districtid', 'length', 'max'=>5),
			array('name', 'length', 'max'=>100),
			array('type, location', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wardid, name, type, location, districtid', 'safe', 'on'=>'search'),
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
			'wardid' => 'Wardid',
			'name' => 'Name',
			'type' => 'Type',
			'location' => 'Location',
			'districtid' => 'Districtid',
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

		$criteria->compare('wardid',$this->wardid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('districtid',$this->districtid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getAll($districtid = null){
        $criteria=new CDbCriteria;
        $criteria->compare('districtid',$districtid);
        $data = Ward::model()->findAll($criteria);
        return $data;
    }

    public function getData($city_id = null){
        return CHtml::listData($this->getAll($city_id), 'wardid', 'name');
    }
    public function getDistrictLabelList(){
        $html = NULL;
        if($this->district){
            $html = "<ul>";
            foreach($this->district as $tags_news){
                $html .= "<li>".$tags_news->name."</li>";
            }
            $html .= "</ul>";
        }
        return $html;

    }
}