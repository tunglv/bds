<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property string $id
 * @property string $title
 * @property integer $catagory_id
 * @property string $type
 * @property string $author
 * @property string $job
 * @property string $created
 */
class Document extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Document the static model class
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
		return 'document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, catagory_id, manager_id, link', 'required'),
			array('catagory_id, catagory_parent', 'numerical', 'integerOnly'=>true),
			array('title, author, job, created, link', 'length', 'max'=>255),
			array('type', 'length', 'max'=>5),
			array('status', 'length', 'max'=>10),
			array('desc', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, desc, catagory_parent, catagory_id,manager_id, status, link, type, author, job, created', 'safe', 'on'=>'search'),
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
            'manager' => array(self::BELONGS_TO, 'Manager', 'manager_id'),
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
			'catagory_id' => 'Catagory',
			'type' => 'Type',
			'author' => 'Author',
			'job' => 'Job',
			'manager_id' => 'Manager',
			'created' => 'Created',
			'link' => 'Link',
			'status' => 'Status',
			'desc' => 'Desc',
			'catagory_parent' => 'Catagory Parent',
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
		$criteria->compare('catagory_id',$this->catagory_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('catagory_parent',$this->catagory_parent,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /*
     * @author: tunglevis
     * @return array status
     */
    public function getStatusData(){
        return array(
            'enable' => 'Hiển thị',
            'disable' => 'Ẩn',
            'pending' => 'Chờ duyệt'
        );
    }

    public function getStatusLabel(){
        return $this->statusData[$this->status];
    }

    /*
     * @author: tunglevis
     * @return array type
     */
    public function getTypeData(){
        return array(
            'doc'=>'Doc',
            'xls'=>'Xls',
            'ppt'=>'Ppt',
            'image'=>'Image',
            'video'=>'Video',
            'mp3'=>'Mp3',
            'link'=>'Link'
        );
    }

    public function getTypeLabel(){
        return $this->typeData[$this->type];
    }

}