<?php

/**
 * This is the model class for table "catagory".
 *
 * The followings are the available columns in table 'catagory':
 * @property string $id
 * @property string $title
 * @property integer $parent_id
 * @property integer $created
 */
class Catagory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Catagory the static model class
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
		return 'catagory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, created', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, parent_id, created', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'parent_id' => 'Parent',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    /*
     * @author: tunglevis
     * @return data parent catagory (catagory with field parent_id = 0)
     */
    public function getParentData(){
        $data = $this->findAllByAttributes(array('parent_id'=>0));
        return $data;
    }
    /*
     * @author: tunglevis
     * @return data label catagory (catagory with field parent_id = 0)
     */
    public function getParentLabel(){
        return CHtml::listData($this->getParentData(), 'id', 'title');
    }
    /*
     * @author: tunglevis
     * @param int: id (or null: get all child catagory)
     * @return data child catagory (catagory with field parent_id != 0)
     */
    public function getChildData($id = null){
        $id = $id ? $id : $this->id;
        $data = $this->findAllByAttributes(array('parent_id'=>$id));
        return $data;
    }
    public function getChildLabel($id = null){
        return CHtml::listData($this->getChildData($id), 'id', 'title');
    }
    /*
     * @author: tunglevis
     * @param int: id
     * @return object catagory by id
     */
    public function getParentById($parent_id = null){
        $parent_id = $parent_id ? $parent_id : $this->parent_id;
        $catagory = $this->findByPk($parent_id);

        return $catagory['title'];
    }
}