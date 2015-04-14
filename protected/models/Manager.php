<?php

/**
 * This is the model class for table "manager".
 *
 * The followings are the available columns in table 'manager':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $status
 * @property string $name
 * @property string $phone
 * @property string $yahoo
 * @property string $skype
 * @property string $reset_time
 */
class Manager extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Manager the static model class
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
		return 'manager';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('email, status', 'required'),
            array('password', 'required', 'on' => 'create'),
            array('password', 'length', 'min' => 6),
            array('email', 'email'),
            array('email', 'unique'),
			array('email, password, name, phone, yahoo, skype', 'length', 'max'=>255),
			array('status', 'length', 'max'=>7),
			array('reset_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, status, name, phone, yahoo, skype, reset_time', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password' => 'Password',
			'status' => 'Status',
			'name' => 'Name',
			'phone' => 'Phone',
			'yahoo' => 'Yahoo',
			'skype' => 'Skype',
			'reset_time' => 'Reset Time',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('yahoo',$this->yahoo,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('reset_time',$this->reset_time,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 20,
                'pageVar' => 'page',
            ),
        ));
	}
    
    public function getIsStaff(){
        return in_array($this->status, array('STAFF', 'MANAGER', 'ADMIN'));
    }
    public function getIsManager(){
        return in_array($this->status, array('MANAGER', 'ADMIN'));
    }
    public function getIsAdmin(){
        return in_array($this->status, array('ADMIN'));
    }
    public function getIsManagerOnly(){
        return in_array($this->status, array('MANAGER'));
    }
    public function getIsStaffOnly(){
        return in_array($this->status, array('STAFF'));
    }
    public function getIsDisable(){
        return in_array($this->status, array('DISABLE'));
    }
    
    
    public function getHashPassword($password){
        Yii::import('ext.PasswordHash');
        $hasher = new PasswordHash(8, TRUE);
        $hash = $hasher->HashPassword($password);
        return $hash;
    }
    
    public function checkPassword($password, $hashPassword){
        Yii::import('ext.PasswordHash');
        $hasher = new PasswordHash(8, TRUE);
        $check = $hasher->CheckPassword($password, $hashPassword);
        return $check;
    }
    

    public function getStatusData() {
        return array(
            'ADMIN' => 'Quản lý cao cấp',
            'MANAGER' => 'Quản lý',
            'STAFF' => 'Nhân viên',
            'DISABLE' => 'Khóa',
        );
    }
    public function getStatusLabel() {
        return $this->statusData[$this->status];
    }
    
    
    public function getStatusDataByLevel() {
        $data = array();
        if($this->status == 'ADMIN'){
            $data['MANAGER'] = 'Quản lý'; 
        }
        if(in_array($this->status, array('ADMIN', 'MANAGER'))){
            $data['STAFF'] = 'Nhân viên';    
        }
        $data['DISABLE'] = 'Khóa';
        return $data;
    }
    
    public function getAdminUrl($type = 'view') {
        $params = array();
        if(Yii::app()->controller->manager->id != $this->id)
        $params['id'] = $this->id;
        
        return Yii::app()->controller->createUrl('/admin/manager/' . $type, $params);
    }
}