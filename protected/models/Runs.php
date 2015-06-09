<?php

/**
 * This is the model class for table "runs".
 *
 * The followings are the available columns in table 'runs':
 * @property integer $id
 * @property integer $id_app
 * @property integer $id_platform
 * @property string $description
 * @property string $changelog
 * @property string $id_order
 * @property integer $id_users
 *
 * The followings are the available model relations:
 * @property App $idApp
 * @property Platforms $idPlatform
 * @property TestRun[] $testRuns
 */
class Runs extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'runs';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'id_app, id_platform',
						'required' 
				),
				array (
						'id_app, id_platform',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'version',
						'length',
						'max' => 30 
				),
				array (
						'changelog',
						'safe' 
				),
				
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_app, id_platform, version, changelog',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'idApp' => array (
						self::BELONGS_TO,
						'App',
						'id_app' 
				),
				'idPlatform' => array (
						self::BELONGS_TO,
						'Platforms',
						'id_platform' 
				),
				'testRuns' => array (
						self::HAS_MANY,
						'TestRun',
						'id_runs' 
				) 
		);
	}
	public function behaviors() {
		return array (
				'CSaveRelationsBehavior' => array (
						'class' => 'application.components.CSaveRelationsBehavior' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'id' => 'Run',
				'id_app' => 'App',
				'id_platform' => 'Platform',
				'version' => 'Version',
				'changelog' => 'Changelog',
                                //'id_order' => 'Order',
                                'id_users' => 'User',
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
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
                
                
                
		
                //$userId = Yii::app()->user->id;
                //$sql = "SELECT id_app FROM app WHERE id_users =".$userId;
                //$sql1 = Yii::app ()->db->createCommand ( $sql )->queryAll ();
                //$criteria->addCondition(array("condtion"=>"id_app = $sql1"));
		$criteria->compare ( 'id', $this->id );
		$criteria->compare ( 'id_app', $this->id_app );
		$criteria->compare ( 'id_platform', $this->id_platform );
		$criteria->compare ( 'version', $this->version, true );
		$criteria->compare ( 'changelog', $this->changelog, true );
                $criteria->compare ('id_order', $this->id_order, true);
                $criteria->compare ('id_users',$this->id_users, true);
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
        
        public function rod($id) {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
                
                
                
		
                //$userId = Yii::app()->user->id;
                //$sql = "SELECT id_app FROM app WHERE id_users =".$userId;
                //$sql1 = Yii::app ()->db->createCommand ( $sql )->queryAll ();
                $criteria->addCondition(array("condtion"=>"id_app = $id"));
		$criteria->compare ( 'id', $this->id );
		$criteria->compare ( 'id_app', $this->id_app );
		$criteria->compare ( 'id_platform', $this->id_platform );
		$criteria->compare ( 'version', $this->version, true );
		$criteria->compare ( 'changelog', $this->changelog, true );
                $criteria->compare ('id_order', $this->id_order, true);
                $criteria->compare ('id_users',$this->id_users, true);
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
        
        
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return Runs the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
        
        public function QuantidadePass($id){
           
                        //  $userId = Yii::app()->Runs->id;
                         $quantidadePass = count ( TestRun::model ()->findAllByAttributes ( array (
				'status' => 1,
                                'id_runs' =>  $id,
				
		) ) );

                        return $quantidadePass;      
                  
        }
        
        public function QuantidadeFail($id){
            $quantidadeFail = count ( TestRun::model ()->findAllByAttributes ( array (
				'status' => 2,
				'id_runs' => $id 
		) ) );
            
            return $quantidadeFail;
            
        }
        
        public function QuantidadeTotal($id){
            $testRuns = TestRun::model ()->findAllByAttributes ( array (
				'id_runs' => $id 
		) );
		
		$quantidadeTotal = count ( $testRuns );
                
                $quanti = Runs::QuantidadePass($id);
				$quantifail = Runs::QuantidadeFail($id);
				//$result = $quanti + $quantifail;
				
                $porcentagem = floor((($quanti + $quantifail)/$quantidadeTotal)*100);
				
                return $porcentagem ;
            
        }
        
        
        
}
