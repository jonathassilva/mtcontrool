<?php

/**
 * This is the model class for table "element".
 *
 * The followings are the available columns in table 'element':
 * @property integer $ID
 * @property string $DESCRIPTION
 *
 * The followings are the available model relations:
 * @property ElementInst[] $elementInsts
 * @property ElementPlatform[] $elementPlatforms
 * @property TestContext[] $testContexts
 */
class Element extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	//private $idCache;
	public $ID_PLAT;
	public $ID_DEV;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DESCRIPTION', 'required'),
			array('DESCRIPTION', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, DESCRIPTION, elementPlatforms.ID_PLATFORM, elementDevices.ID_DEVICE, ID_PLAT, ID_DEV', 'safe', 'on'=>'search'),
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
			//'elementInsts' => array(self::HAS_MANY, 'ElementInst', 'ID_ELEMENT'),
			'elementInst' => array(self::HAS_MANY, 'ElementInst', 'ID_ELEMENT'),
			'elementPlatforms' => array(self::HAS_MANY, 'ElementPlatform', 'ID_ELEMENT'),
			'elementDevices' => array(self::HAS_MANY, 'ElementDevice', 'ID_ELEMENT'),
			'testContexts' => array(self::HAS_MANY, 'TestContext', 'ID_ELEMENT'),
			'platforms' => array(self::MANY_MANY, 'Platforms', 'element_platform(ID_ELEMENT, ID_PLATFORM)'),
			'devices' => array(self::MANY_MANY, 'Device', 'element_device(ID_ELEMENT, ID_DEVICE)'),

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
			'ID' => 'ID',
			'DESCRIPTION' => 'Description',
		);
	}

	public function platform_list($id){

		$testModel=$this->findAllBySql('SELECT * FROM ELEMENT WHERE ID ='.$id);


		$cont=0;

		$return='';
		foreach($testModel as $value ){

			while( array_key_exists($cont, $value->elementPlatforms)){
				if($return==''){
					$return =  $value->elementPlatforms[$cont]->iDPLATFORM->name;
				}else{
					$return =  $return." / ".$value->elementPlatforms[$cont]->iDPLATFORM->name;
				}
				
		 		$cont++;
			}
		 
		 $cont=0;
		}
		return $return;
	}

	public function device_list($id){
		$testModel=$this->findAllBySql('SELECT * FROM ELEMENT WHERE ID ='.$id);


		$cont=0;

		$return='';
		foreach($testModel as $value ){

			while( array_key_exists($cont, $value->elementDevices)){
				if($return==''){
					$return =  $value->elementDevices[$cont]->iDDEVICE->DESCRIPTION;
				}else{
					$return =  $return." / ".$value->elementDevices[$cont]->iDDEVICE->DESCRIPTION;
				}
				
		 		$cont++;
			}
		 
		 $cont=0;
		}
		return $return;
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
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->order = 'DESCRIPTION ASC';

		$criteria->with=array('elementPlatforms','elementDevices');
		//$criteria->with=array('elementPlatforms');
		$criteria->compare('elementPlatforms.ID_PLATFORM',$this->ID_PLAT, true);
		$criteria->compare('elementDevices.ID_DEVICE',$this->ID_DEV, true);
		$criteria->together=true;


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
	 * @return Element the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

    /*public function beforeDelete()
    {
        $this->idCache = $this->id;

        return parent::beforeDelete();
    }

    public function afterDelete()
    {
        $criteria = new CDbCriteria(array(
                'condition' => 'parent_id=:parentId',
                'params' => array(
                    ':parentId' => $this->idCache),
            ));

        $children = Child::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }

        parent::afterDelete();
    }*/


}
