<?php

/**
 * This is the model class for table "test_case".
 *
 * The followings are the available columns in table 'test_case':
 * @property integer $id
 * @property string $num
 * @property string $name
 * @property string $description
 * @property string $required
 * @property string $note
 * @property string $steps
 * @property string $result
 * @property integer $id_characteristic
 * @property integer $id_criteria
 *
 * The followings are the available model relations:
 * @property Characteristic $idCharacteristic
 * @property Criteria $idCriteria
 * @property TestPlatform[] $testPlatforms
 * @property TestRun[] $testRuns
  * @property Platforms[] $platforms
  * @property CharacteristicPlatforms[] $characteristicplatforms
 
 */
class TestCase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_case';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num, name, description, required, notes, steps, result, id_criteria', 'required'),
			array('id_characteristic, id_criteria', 'numerical', 'integerOnly'=>true),
			array('num', 'length', 'max'=>10),
			array('name, required', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, num, name, description, required, notes, steps, result, id_characteristic, id_criteria', 'safe', 'on'=>'search'),
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
			'idCharacteristic' => array(self::BELONGS_TO, 'Characteristic', 'id_characteristic'),
			'idCriteria' => array(self::BELONGS_TO, 'Criteria', 'id_criteria'),
			'testPlatforms' => array(self::HAS_MANY, 'TestPlatform', 'id_test_case'),
			'testRuns' => array(self::HAS_MANY, 'TestRun', 'id_test_case'),
                        'platforms' => array(self::MANY_MANY, 'Platforms', 'test_platform(id_platform, id_test_case)'),
                        'characteristicplatforms'=>array(self::MANY_MANY,'CharacteristicPlatforms','characteristic_platforms(id_platform,id_characteristic)'),
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
			'num' => 'Test Case´s Identifier:',
			'name' => 'Name:',
			'description' => 'Description:',
			'required' => 'Required:',
			'notes' => 'Note:',
			'steps' => 'Steps:',
			'result' => 'Result:',
			'id_characteristic' => 'Characteristic',
			'id_criteria' => 'Criteria',
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
		$criteria->compare('num',$this->num,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('required',$this->required,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('steps',$this->steps,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('id_characteristic',$this->id_characteristic);
		$criteria->compare('id_criteria',$this->id_criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestCase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
