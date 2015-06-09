<?php

/**
 * This is the model class for table "element_inst".
 *
 * The followings are the available columns in table 'element_inst':
 * @property integer $ID
 * @property integer $ID_ELEMENT
 * @property integer $ID_TEST_CONTEXT
 * @property string $ELEMENT_TYPE
 * @property string $DESCRIPTION
 * @property integer $START_PARAM
 * @property integer $END_PARAM
 *
 * The followings are the available model relations:
 * @property Element $iDELEMENT
 * @property TestContext $iDTESTCONTEXT
 */
class ElementInst extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'element_inst';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_ELEMENT, ID_TEST_CONTEXT, ELEMENT_TYPE, DESCRIPTION', 'required'),
			array('ID_ELEMENT, ID_TEST_CONTEXT, START_PARAM, END_PARAM', 'numerical', 'integerOnly'=>true),
			array('ELEMENT_TYPE', 'length', 'max'=>10),
			array('DESCRIPTION', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, ID_ELEMENT, ID_TEST_CONTEXT, ELEMENT_TYPE, DESCRIPTION, START_PARAM, END_PARAM', 'safe', 'on'=>'search'),
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
			'iDTESTCONTEXT' => array(self::BELONGS_TO, 'TestContext', 'ID_TEST_CONTEXT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_ELEMENT' => 'Id Element',
			'ID_TEST_CONTEXT' => 'Id Test Context',
			'ELEMENT_TYPE' => 'Type',
			'DESCRIPTION' => 'Description',
			'START_PARAM' => 'Start parameter',
			'END_PARAM' => 'End parameter',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('ID_ELEMENT',$this->ID_ELEMENT);
		$criteria->compare('ID_TEST_CONTEXT',$this->ID_TEST_CONTEXT);
		$criteria->compare('ELEMENT_TYPE',$this->ELEMENT_TYPE,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('START_PARAM',$this->START_PARAM);
		$criteria->compare('END_PARAM',$this->END_PARAM);

		return new CActiveDataProvider($this, array(
			'pagination' => array(
             'pageSize' => 1000,
        	),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ElementInst the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
