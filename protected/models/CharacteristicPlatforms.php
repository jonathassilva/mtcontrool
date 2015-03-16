<?php

/**
 * This is the model class for table "characteristic_platforms".
 *
 * The followings are the available columns in table 'characteristic_platforms':
 * @property integer $id_characteristic
 * @property integer $id_platform
 *
 * The followings are the available model relations:
 * @property Characteristic $idCharacteristic
 * @property Platforms $idPlatform
 */
class CharacteristicPlatforms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'characteristic_platforms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_characteristic, id_platform', 'required'),
			array('id_characteristic, id_platform', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_characteristic, id_platform', 'safe', 'on'=>'search'),
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
			'idPlatform' => array(self::BELONGS_TO, 'Platforms', 'id_platform'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_characteristic' => 'Id Characteristic',
			'id_platform' => 'Id Platform',
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

		$criteria->compare('id_characteristic',$this->id_characteristic);
		$criteria->compare('id_platform',$this->id_platform);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CharacteristicPlatforms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
