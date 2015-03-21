<?php

/**
 * This is the model class for table "criteria".
 *
 * The followings are the available columns in table 'criteria':
 * @property integer $id
 * @property string $num_order
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Characteristic[] $characteristics
 */
class Criteria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'criteria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_order, name', 'required'),
			array('num_order', 'length', 'max'=>45),
			array('name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, num_order, name', 'safe', 'on'=>'search'),
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
			'characteristics' => array(self::HAS_MANY, 'Characteristic', 'id_criteria'),
		);
	}

        public function behaviors(){
		return array(
				'CSaveRelationsBehavior' => array('class' => 'application.components.CSaveRelationsBehavior'),
		);
	}
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'num_order' => 'Criteria´s Identifier:',
			'name' => 'Name:',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('num_order',$this->num_order,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Criteria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
       
}
