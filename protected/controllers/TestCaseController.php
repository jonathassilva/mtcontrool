<?php

class TestCaseController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Selectdos','Selectdos1'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TestCase;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TestCase'])) {
			$model->attributes=$_POST['TestCase'];
                        //salvando a relacao com a tabela Platforms
			$model->setRelationRecords('platforms',is_array(@$_POST['Platforms']) ? $_POST['Platforms'] : array());
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TestCase'])) {
			$model->attributes=$_POST['TestCase'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TestCase');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
                
                
                $model = new TestCase();
                if(isset($_POST['ajax'])){
                    if($_POST['ajax']== 'test-case-form'){
                        echo $_POST['testCase[name]'];
                    }
                    Yii::app()->end();
                }
                
              
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TestCase('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['TestCase'])) {
			$model->attributes=$_GET['TestCase'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TestCase the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TestCase::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TestCase $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='test-case-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actionSelectdos(){
           
            //$id_cri = $_POST['TestCase']['id_criteria'];
            $id_cri = $_POST['TestCase']['id_criteria'];
            
            $lista = Characteristic::model()->findAll('id_criteria  = :id_cri',  array(':id_cri'=>$id_cri));
            $lista = CHtml::listData($lista,'id','name');
            //var_dump($lista);
            
            echo CHtml::tag('option',array('value' => ''), 'Select', TRUE);
            
            foreach($lista as $valor => $name){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($name),true);
            }
            
            
        }
        
        public function actionSelectdos1(){
           
            //$id_cri = $_POST['TestCase']['id_criteria'];
            $id_cha = $_POST['TestCase']['id_characteristic'];
            
           // $sql = 'SELECT id_platform FROM characteristic_platforms WHERE '.$id_cri.'=id_characteristic';
            //$list= Yii::app()->db->createCommand($sql)->queryAll();
            /*$rs=array();
            foreach($list as $item){
                //process each item here
                $rs[]=$item['id_platform'];
            }*/
            
            echo CHtml::tag('option',array('value' => ''), 'Select', TRUE);
            
            $lista = CharacteristicPlatforms::model()->findAll('id_characteristic  = :id_cha',  array(':id_cha'=>$id_cha));
            $lista = CHtml::listData($lista,'id','name');
            //var_dump($lista);
            
            foreach($lista as $valor => $name){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($name),true);
            }
            
            
        }
        
        
        
}