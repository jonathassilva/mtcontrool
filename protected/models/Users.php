<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $user_name
 * @property string $country
 * @property integer $phone
 * @property string $level
 * @property string $email
 * @property string $password
 *
 * The followings are the available model relations:
 * @property App[] $apps
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, user_name, country, phone, level', 'required'),
			array('phone', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>70),
			array('user_name', 'length', 'max'=>60),
			array('country', 'length', 'max'=>200),
			array('level', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, user_name, country, phone, level, email, password', 'safe', 'on'=>'search'),
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
			'apps' => array(self::HAS_MANY, 'App', 'id_users'),
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
			'user_name' => 'User Name',
			'country' => 'Country',
			'phone' => 'Phone',
			'level' => 'Level',
			'email' => 'Email',
			'password' => 'Password',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        # Função para converter em md5 a variavel password 
        public function beforeSave() 
        { 
            $pass = md5($this->password).Yii::app()->params["salt"]; 
            $this->password = $pass; 
            return true; 
        } 
}
