<?php

class TestContextController extends Controller
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'ListDevices'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'ListDevices'),
				//'users'=>array('@'),
				'expression'=>'$user->isAdmin()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				//'users'=>array('admin'),
				'expression'=>'$user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
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
		$model=new TestContext;
		$model->ID_USER = Yii::app()->user->getId();

		$modelsApps= App::model()->findAll();
		$appsArray = CHtml::listData($modelsApps, 'id', 'name');

		$modelsPlatforms= Platforms::model()->findAll();
		$platformsArray = CHtml::listData($modelsPlatforms, 'id', 'name');

		//$modelsDevice= Device::model()->findAll();
		//$devicesArray = CHtml::listData($modelsDevice, 'ID', 'DESCRIPTION');
		$devicesArray = array();
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['buttonCancel'])) {
			$this->redirect(array('admin'/*,'id'=>$model->ID*/));
		}

		if (isset($_POST['TestContext'])) {
			$model->attributes=$_POST['TestContext'];
			if ($model->save()) {
				$this->redirect("/mtcontrool/index.php/elementInst/create?idTestContext=".$model->ID."&idDevice=".$model->ID_DEVICE);
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'appsArray'=>$appsArray,
			'platformsArray'=>$platformsArray,
			'devicesArray'=>$devicesArray
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

		$modelsApps= App::model()->findAll();
		$appsArray = CHtml::listData($modelsApps, 'id', 'name');

		$modelsPlatforms= Platforms::model()->findAll();
		$platformsArray = CHtml::listData($modelsPlatforms, 'id', 'name');

		$modelsDevice= Device::model()->findAll(array(
		                                    'select'=>'ID,DESCRIPTION',
		                                    'condition'=>"ID_PLATFORM='$model->ID_PLATFORM'"
		                                  ));
		$devicesArray = CHtml::listData($modelsDevice, 'ID', 'DESCRIPTION');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['buttonCancel'])) {
			$this->redirect(array('admin'/*,'id'=>$model->ID*/));
		}

		if (isset($_POST['TestContext'])) {
			$model->attributes=$_POST['TestContext'];
			if ($model->save()) {
				//$this->redirect(array('admin','id'=>$model->ID));
				$this->redirect("/mtcontrool/index.php/elementInst/update?idTestContext=".$model->ID."&idDevice=".$model->ID_DEVICE);				
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'appsArray'=>$appsArray,
			'platformsArray'=>$platformsArray,
			'devicesArray'=>$devicesArray
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
		$dataProvider=new CActiveDataProvider('TestContext');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TestContext('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['TestContext'])) {
			$model->attributes=$_GET['TestContext'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TestContext the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TestContext::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TestContext $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='test-context-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionListDevices(){
           
    
            if(isset($_POST['categoryid']) && $_POST['categoryid']!=''){
		        $categoryid=$_POST['categoryid'];
		        $usertype=Device::model()->findAll(array(
		                                    'select'=>'ID,DESCRIPTION',
		                                    'condition'=>"ID_PLATFORM='$categoryid'"
		                                  ));       
		              
		        $data=CHtml::listData($usertype,'ID','DESCRIPTION');
		        echo CHtml::tag('option',array('value' => ''),
		                           CHtml::encode('--- Choose a device ---'),true);
		 
		        foreach($data as $id => $value)
		        {
		          echo CHtml::tag('option',array('value'=>$id),CHtml::encode($value),true);
		        }                
		   }else{
		   		echo CHtml::tag('option',array('value' => ''),
		                           CHtml::encode('--- Choose a device ---'),true);
		   }

          
            
        }
}