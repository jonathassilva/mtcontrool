<?php

/**
 * This is the model class for table "test_platform".
 *
 * The followings are the available columns in table 'test_platform':
 * @property integer $id_platform
 * @property integer $id_test_case
 *
 * The followings are the available model relations:
 * @property Platforms $idPlatform
 * @property TestCase $idTestCase
 */
class TestPlatform extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_platform';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_platform, id_test_case', 'required'),
			array('id_platform, id_test_case', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_platform, id_test_case', 'safe', 'on'=>'search'),
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
			'idPlatform' => array(self::BELONGS_TO, 'Platforms', 'id_platform'),
			'idTestCase' => array(self::BELONGS_TO, 'TestCase', 'id_test_case'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_platform' => 'Id Platform',
			'id_test_case' => 'Id Test Case',
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

		$criteria->compare('id_platform',$this->id_platform);
		$criteria->compare('id_test_case',$this->id_test_case);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestPlatform the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
