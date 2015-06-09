<?php

class ElementInstController extends Controller
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
		/*return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
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
			),
		);*/
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
	public function actionCreate($idTestContext,$idDevice)
	{

		//$model=new ElementInst;
		$elements = new Element;
		//$elements=Element::model()->findAll();
        $elements=Element::model()->with('elementDevices')->findAll('ID_DEVICE=' . $idDevice);
        $arrayElementType = array('nominal'=>'Nominal','interval'=>'Interval');
        $arrayModels=array();

        foreach($elements as $i=>$element)
        {
        	$model = new ElementInst;
        	$model->ID_ELEMENT=$element->ID;
        	$model->ID_TEST_CONTEXT=$idTestContext;
        	array_push($arrayModels, $model);
        }

        if (isset($_POST['buttonCancel'])) {
			$_SESSION['model-element']=null;
			$_SESSION['form-element']=null;
			//$this->redirect(array('admin'/*,'id'=>$model->ID*/));
			$this->redirect("/mtcontrool/index.php/testContext/admin");
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        if(isset($_POST['ElementInst']))
	    {
	        $valid=true;
	        foreach($arrayModels as $i=>$item)
	        {
	            if(isset($_POST['ElementInst'][$i]))
	            $item->attributes=$_POST['ElementInst'][$i];
	        	echo $item->DESCRIPTION;
	            $valid=$item->validate() && $valid;
	            if($valid){
	            	$item->save();
	            }
	        }
	        
	        $this->redirect("/mtcontrool/index.php/testContext/admin");
	    }

		$this->render('create',array(
			//'model'=>$model,
			'arrayModels'=>$arrayModels,
			'arrayElementType'=>$arrayElementType
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($idTestContext,$idDevice)
	{
		//$model=$this->loadModel($id);
		$arrayModels=ElementInst::model()->findAll('ID_TEST_CONTEXT=' . $idTestContext, 'ID_ELEMENT=1');
		$elements=Element::model()->with('elementDevices')->findAll('ID_DEVICE=' . $idDevice);
		//var_dump($arrayModels);
		$arrayElementType = array('nominal'=>'Nominal','interval'=>'Interval');

		/*
		SE JÁ POSSUI UMA INSTACIA PARA O ELEMENTO, ENTAO REMOVE O ELEMENTO
		PARA QUE NÃO SEJA SEJA CRIADO UMA NOVA INSTANCIA PARA O ELEMENTO
		EXIBINDO APENAS A INSTANCIA QUE JÁ EXISTE.
		*/
		foreach($elements as $i=>$element){
    		foreach($arrayModels as $j=>$item){
		    	if($element->ID==$item->ID_ELEMENT){
		    		unset($elements[$i]);
		    	}
		    }
    	}
		
		foreach($elements as $i=>$element)
        {
        	$model = new ElementInst;
        	$model->ID_ELEMENT=$element->ID;
        	$model->ID_TEST_CONTEXT=$idTestContext;
        	array_push($arrayModels, $model);
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['buttonCancel'])) {
			$_SESSION['model-element']=null;
			$_SESSION['form-element']=null;
			//$this->redirect(array('admin'/*,'id'=>$model->ID*/));
			$this->redirect("/mtcontrool/index.php/testContext/admin");
		}

		if(isset($_POST['ElementInst']))
	    {
	        $valid=true;
	        foreach($arrayModels as $i=>$item)
	        {
	            if(isset($_POST['ElementInst'][$i]))
	            $item->attributes=$_POST['ElementInst'][$i];
	        	echo $item->DESCRIPTION;
	            $valid=$item->validate() && $valid;
	            if($valid){
	            	$item->save();
	            }
	        }
	        
	        $this->redirect("/mtcontrool/index.php/testContext/admin");
	    }


		/*if (isset($_POST['ElementInst'])) {
			$model->attributes=$_POST['ElementInst'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->ID));
			}
		}*/

		$this->render('update',array(
			'arrayModels'=>$arrayModels,
			'arrayElementType'=>$arrayElementType,
			'idTestContext'=>$idTestContext,
			'idDevice'=>$idDevice
			//'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$idTestContext,$idDevice)
	{
		//if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			$this->redirect("/mtcontrool/index.php/elementInst/update?idTestContext=".$idTestContext."&idDevice=".$idDevice);
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			/*if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
				//$this->redirect("/mtcontrool/index.php/elementinst/update?idTestContext=".$idTextContext."&idDevice=".$idDevice);				
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ElementInst');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ElementInst('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['ElementInst'])) {
			$model->attributes=$_GET['ElementInst'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ElementInst the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ElementInst::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ElementInst $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='element-inst-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}