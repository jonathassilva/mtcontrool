<?php

/**
 * This is the model class for table "app".
 *
 * The followings are the available columns in table 'app':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $category
 * @property string $developer
 * @property integer $id_users
 *
 * The followings are the available model relations:
 * @property Users $idUsers
 * @property Languages[] $languages
 * @property Platforms[] $platforms
 * @property Runs[] $runs
 * @property Category[] $category
 */
class App extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'app';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, developer', 'required'),
			array('id_users', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			//array('category', 'length', 'max'=>100),
			array('developer', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, developer, id_users', 'safe', 'on'=>'search'),
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
			'idUsers' => array(self::BELONGS_TO, 'Users', 'id_users'),
			'languages' => array(self::MANY_MANY, 'Languages', 'app_language(id_app, id_languages)'),
			'platforms' => array(self::MANY_MANY, 'Platforms', 'app_platform(id_app, id_platform)'),
                        'category' => array(self::MANY_MANY,'Category','app_category(id_app, id_category)'),
                        'appUsers'=>array(self::MANY_MANY,'AppUsers','app_users(id_app, id_users)'),
			'runs' => array(self::HAS_MANY, 'Runs', 'id_app'),
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
			'name' => 'Name',
			'description' => 'Description',
			'developer' => 'Developer',
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
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
              
		$criteria=new CDbCriteria;
           

                $userId = Yii::app()->user->id;
                //$userLevel = Users::model()->level;
              
               // $sql = AppUsers::model ()->findBySql ( 'SELECT id_users from app_users WHERE id_users ='.$userId );
               // $sql =  'SELECT level from users WHERE id ='.$userId ;
               /* $connection=Yii::app()->db;
                $sql = 'SELECT id_users FROM app_users WHERE id_users ='.$userId;
		$command=$connection->createCommand($sql);
                $tenta=$command->query();*/
                    //  $modelApp = AppUsers::model()->findB(array('id_users'=>$userId));  
               
               //  var_dump($modelApp);
                
             
               // $criteria->compare('app_users.id_users', $this->id_users, true);
             //  $posts=  AppUsers::model()->findAllBySql("select id_app from app_users where id_users = ".$userId);
               // $criteria->addCondition(array("condtion"=>"id_users = $userId"));
             
             //  $criteria->addInCondition('id',$value);


               $results = AppUsers::model()->findAll('id_users=:v',array(':v'=>$userId));
               $values = array();
                
               foreach($results as $r){ 
                    $values[] = $r->id_app;

                }

                $criteria->addInCondition('id', $values);
               

                      
                $criteria->addCondition(array("condtion"=>"$userId = id_users"), 'OR');
                $criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('developer',$this->developer,true);
		$criteria->compare('id_users',$this->id_users);
               
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function searchAdmin()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
              
		$criteria=new CDbCriteria;
                
               // $userId = Yii::app()->user->id;
                //$userLevel = Users::model()->level;
               // $sql = Users::model ()->findBySql ( 'SELECT level from users WHERE id ='.$userId );
               // $sql =  'SELECT level from users WHERE id ='.$userId ;
              //  $connection = Yii::app ()->db;
                //$command = $connection->createCommand ( 'SELECT level from users WHERE id ='.$userId );
                //$rowCount = $command->execute ();
                
                //$criteria->addCondition(array("condtion"=>"id_users = $userId"));
                //$criteria->addCondition(array("condtion"=>"$rowCount = '0'"));
                $criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('developer',$this->developer,true);
		$criteria->compare('id_users',$this->id_users);
               
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        
        
        //---------------
        
       
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return App the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
       
      
        
}
