<?php

/**
 * This is the model class for table "registered".
 *
 * The followings are the available columns in table 'registered':
 * @property string $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $status
 * @property integer $created
 */
class Registered extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registered the static model class
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
		return 'registered';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phone', 'required'),
			array('created', 'numerical', 'integerOnly'=>true),
			array('name, phone, email', 'length', 'max'=>255),
			array('status', 'length', 'max'=>7),

            array('phone','unique', 'message'=>'This issue already exists.'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, phone, email, status, created', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'phone' => 'Phone',
			'email' => 'Email',
			'status' => 'Status',
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
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getStatusData(){
        return array(
            'enable' => 'Đã duyệt',
            'disable' => 'Hủy',
            'pending' => 'Chờ duyệt'
        );
    }
    public function getStatusLabel(){
        return $this->statusData[$this->status];
    }
}