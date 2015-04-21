<?php

/**
 * This is the model class for table "district".
 *
 * The followings are the available columns in table 'district':
 * @property string $districtid
 * @property string $name
 * @property string $type
 * @property string $location
 * @property string $provinceid
 */
class District extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return District the static model class
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
		return 'district';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('districtid, name, type, location, provinceid', 'required'),
			array('districtid, provinceid', 'length', 'max'=>5),
			array('name', 'length', 'max'=>100),
			array('type, location', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('districtid, name, type, location, provinceid', 'safe', 'on'=>'search'),
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
			'districtid' => 'Districtid',
			'name' => 'Name',
			'type' => 'Type',
			'location' => 'Location',
			'provinceid' => 'Provinceid',
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

		$criteria->compare('districtid',$this->districtid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('provinceid',$this->provinceid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getAll($provinceid = null){
        $criteria=new CDbCriteria;
        $criteria->compare('provinceid',$provinceid);
        $data = District::model()->findAll($criteria);
        return $data;
    }

    public function getData($city_id = null){
        return CHtml::listData($this->getAll($city_id), 'districtid', 'name');
    }
    public function getCityLabelList(){
        $html = NULL;
        if($this->city){
            $html = "<ul>";
            foreach($this->city as $tags_news){
                $html .= "<li>".$tags_news->name."</li>";
            }
            $html .= "</ul>";
        }
        return $html;

    }
}