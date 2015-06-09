<?php

/**
 * This is the model class for table "test_context".
 *
 * The followings are the available columns in table 'test_context':
 * @property integer $ID
 * @property integer $ID_USER
 * @property integer $ID_APP
 * @property integer $ID_PLATFORM
 * @property integer $ID_DEVICE
 * @property string $DESCRIPTION
 *
 * The followings are the available model relations:
 * @property ElementInst[] $elementInsts
 * @property Users $iDUSER
 * @property App $iDAPP
 * @property Platforms $iDPLATFORM
 * @property Device $iDDEVICE
 */
class TestContext extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_context';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DESCRIPTION, ID_USER, ID_APP, ID_PLATFORM, ID_DEVICE', 'required'),
			array('ID_USER, ID_APP, ID_PLATFORM, ID_DEVICE', 'numerical', 'integerOnly'=>true),
			array('DESCRIPTION', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, ID_USER, ID_APP, ID_PLATFORM, ID_DEVICE, DESCRIPTION, iDUSER.name, iDAPP.name, iDPLATFORM.name, iDDEVICE.DESCRIPTION', 'safe', 'on'=>'search'),
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
			'elementInsts' => array(self::HAS_MANY, 'ElementInst', 'ID_TEST_CONTEXT'),
			'iDUSER' => array(self::BELONGS_TO, 'Users', 'ID_USER'),
			'iDAPP' => array(self::BELONGS_TO, 'App', 'ID_APP'),
			'iDPLATFORM' => array(self::BELONGS_TO, 'Platforms', 'ID_PLATFORM'),
			'iDDEVICE' => array(self::BELONGS_TO, 'Device', 'ID_DEVICE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_USER' => 'Id User',
			'ID_APP' => 'App',
			'ID_PLATFORM' => 'Platform',
			'ID_DEVICE' => 'Device',
			'DESCRIPTION' => 'Description',
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
		//$criteria->compare('ID_USER',$this->ID_USER);
		//$criteria->compare('ID_APP',$this->ID_APP);
		//$criteria->compare('ID_PLATFORM',$this->ID_PLATFORM);
		//$criteria->compare('ID_DEVICE',$this->ID_DEVICE);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);


		$criteria->with=array('iDUSER','iDAPP','iDPLATFORM','iDDEVICE');
		//$criteria->with=array('iDBRAND');
		$criteria->compare('iDUSER.name',$this->ID_USER, true);
		$criteria->compare('iDAPP.name',$this->ID_APP, true);
		$criteria->compare('iDPLATFORM.name',$this->ID_PLATFORM, true);
		$criteria->compare('iDDEVICE.DESCRIPTION',$this->ID_DEVICE, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/*public function platform_list($id){

		$testModel=$this->findAllBySql('SELECT * FROM TEST_CONTEXT WHERE ID ='.$id);


		$cont=0;

		$return='';
		foreach($testModel as $value ){

			while( array_key_exists($cont, $value->iDPLATFORM)){
				if($return==''){
					$return =  $value->iDPLATFORM[$cont]->name;
				}else{
					$return =  $return." / ".$value->iDPLATFORM[$cont]->name;
				}
				
		 		$cont++;
			}
		 
		 $cont=0;
		}
		return $return;
	}*/


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestContext the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
