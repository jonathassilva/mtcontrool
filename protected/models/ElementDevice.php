<?php

/**
 * This is the model class for table "element_device".
 *
 * The followings are the available columns in table 'element_device':
 * @property integer $ID_ELEMENT
 * @property integer $ID_DEVICE
 *
 * The followings are the available model relations:
 * @property Element $iDELEMENT
 * @property Device $iDDEVICE
 */
class ElementDevice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'element_device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_ELEMENT, ID_DEVICE', 'required'),
			array('ID_ELEMENT, ID_DEVICE', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ELEMENT, ID_DEVICE', 'safe', 'on'=>'search'),
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
			'iDELEMENT' => array(self::BELONGS_TO, 'Element', 'ID_ELEMENT'),
			'iDDEVICE' => array(self::BELONGS_TO, 'Device', 'ID_DEVICE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ELEMENT' => 'Id Element',
			'ID_DEVICE' => 'Id Device',
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

		$criteria->compare('ID_ELEMENT',$this->ID_ELEMENT);
		$criteria->compare('ID_DEVICE',$this->ID_DEVICE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ElementDevice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
