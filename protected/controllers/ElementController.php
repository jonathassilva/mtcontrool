<?php

class ElementController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','elements','teste'),
				//'users'=>array('@'),
				'expression'=>'$user->isAdmin()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				///'users'=>array('admin'),
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
		$model=new Element;

		$modelsPlatforms= Platforms::model()->findAll();
		$platformsArray = CHtml::listData($modelsPlatforms, 'id', 'name');

		//$modelsDevices= Device::model()->findAll();
		//$devicesArray = CHtml::listData($modelsDevices, 'ID', 'DESCRIPTION');

		$devicesArray=array();

		//$modelsPlatforms = Platforms::model()->findAllbySql('SELECT ID, NAME FROM PLATFORMS ORDER BY NAME');
		//$platformsArray = CHtml::listData($modelsPlatforms, 'ID', 'NAME');
		//var_dump($platformsArray);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['buttonCancel'])) {
			$_SESSION['model-element']=null;
			$_SESSION['form-element']=null;
			$this->redirect(array('admin'/*,'id'=>$model->ID*/));
		}

		if (array_key_exists('form-element', $_SESSION)) {
			if ($_SESSION['form-element'] == "p2") {
				$_SESSION['form-element']=null;
				$model=$_SESSION['model-element'];
				$_SESSION['model-element']=null;
				//$model->attributes=$_POST['Element'];
				//echo "teste";
				//echo $model->DESCRIPTION;
				
				$model->setRelationRecords('devices',is_array(@$_POST['Devices']) ? $_POST['Devices'] : array());
				/*GARENTE QUE O NOME DO ELEMENTO SEMPRE SEJA SALVO EM MAIÚSCULO*/
				$model->DESCRIPTION = strtoupper($model->DESCRIPTION);
				if ($model->save()) {
					$this->redirect(array('admin'/*,'id'=>$model->ID*/));
					//$this->redirect('/mtcontrool/index.php/Element/admin');
				}
			}

		}
		



		if (isset($_POST['Element'])) {
			$model->attributes=$_POST['Element'];
			$model->setRelationRecords('platforms',is_array(@$_POST['Platforms']) ? $_POST['Platforms'] : array());
			if ($_SESSION['form-element'] == "p1") {
				$_SESSION['form-element']=null;

				//$selected_platforms = array ();
				//para cada plataforma, insere os id_plataforma escolhidos no array
				//var_dump($model->platforms);
				$tempArray = array();

				$count=0;
				$tempArray=array();
				foreach ( $model->platforms as $platform ){
					//echo $platform->id."<br/>" ;
					//echo $platform->name."<br/>" ;
					/*$device= Yii::app()->db->createCommand('SELECT *
															  FROM Device
															  WHERE ID_PLATFORM='.$platform->id)->query();*/
					
					$device= Device::model()->findAllBySql('SELECT *
															  FROM Device
															  WHERE ID_PLATFORM='.$platform->id.' ORDER BY DESCRIPTION');
					//$data = CHtml::listData($device, 'ID', 'DESCRIPTION');
					//var_dump($device);
					//echo "<br/>";
					array_push($tempArray, $device);
					$count++;
					
				}

				if($tempArray!=null){
					if($tempArray[0]){
						foreach ($tempArray as $value) {
							//echo  $value->ID;
							if($value){
								foreach ($value as $value1) {
									//echo $value1->ID."<br/>";

									//echo $value1->DESCRIPTION."<br/>";
									$devicesArray[$value1->ID] = $value1->DESCRIPTION;
								}
								//$devicesArray[$key] = $value;
								
							}
							
						}
					}
				}

				

				
				//var_dump($tempArray);
					



				$this->render('create_p2',array(
				'model'=>$model,
				'platformsArray'=>$platformsArray,
				'devicesArray'=>$devicesArray,
				));
				$_SESSION['model-element']=$model;
			}

			
		}else{
			$this->render('create',array(
			'model'=>$model,
			'platformsArray'=>$platformsArray,
			'devicesArray'=>$devicesArray,
			));
		}

		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelList=new Element('search');

		$modelsPlatforms= Platforms::model()->findAll();
		$platformsArray = CHtml::listData($modelsPlatforms, 'id', 'name');

		//$modelsDevices= Device::model()->findAll();
		//$devicesArray = CHtml::listData($modelsDevices, 'ID', 'DESCRIPTION');

		$devicesArray=array();

		//$modelInst=new ElementInst('search');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['buttonCancel'])) {
			$_SESSION['model-element']=null;
			$_SESSION['form-element']=null;
			$this->redirect(array('admin'/*,'id'=>$model->ID*/));
		}

		if (array_key_exists('form-element', $_SESSION)) {
			if ($_SESSION['form-element'] == "p2") {
				$_SESSION['form-element']=null;
				$model=$_SESSION['model-element'];
				$_SESSION['model-element']=null;
				//$model->attributes=$_POST['Element'];
				//echo "teste";
				//echo $model->DESCRIPTION;
				$model->setRelationRecords('devices',is_array(@$_POST['Devices']) ? $_POST['Devices'] : array());
				/*GARENTE QUE O NOME DO ELEMENTO SEMPRE SEJA SALVO EM MAIÚSCULO*/
				$model->DESCRIPTION = strtoupper($model->DESCRIPTION);
				if ($model->save()) {
					$this->redirect(array('admin'/*,'id'=>$model->ID*/));
					//$this->redirect('/mtcontrool/index.php/Element/admin');
				}
			}

		}
		

		if (isset($_POST['Element'])) {
			$model->attributes=$_POST['Element'];
			$model->setRelationRecords('platforms',is_array(@$_POST['Platforms']) ? $_POST['Platforms'] : array());
			
			
			if ($_SESSION['form-element'] == "p1") {
				
				
				$_SESSION['form-element']=null;

				//$selected_platforms = array ();
				//para cada plataforma, insere os id_plataforma escolhidos no array
				//var_dump($model->platforms);
				$tempArray = array();

				$count=0;
				$tempArray=array();
				foreach ( $model->platforms as $platform ){
					//echo $platform->id."<br/>" ;
					//echo $platform->name."<br/>" ;
					/*$device= Yii::app()->db->createCommand('SELECT *
															  FROM Device
															  WHERE ID_PLATFORM='.$platform->id)->query();*/
					
					$device= Device::model()->findAllBySql('SELECT *
															  FROM Device
															  WHERE ID_PLATFORM='.$platform->id.' ORDER BY DESCRIPTION');
					//$data = CHtml::listData($device, 'ID', 'DESCRIPTION');
					//var_dump($device);
					//echo "<br/>";
					array_push($tempArray, $device);
					$count++;
					
				}

				if($tempArray!=null){
					if($tempArray[0]){
						foreach ($tempArray as $value) {
							//echo  $value->ID;
							if($value){
								foreach ($value as $value1) {
									//echo $value1->ID."<br/>";

									//echo $value1->DESCRIPTION."<br/>";
									$devicesArray[$value1->ID] = $value1->DESCRIPTION;
								}
								//$devicesArray[$key] = $value;
								
							}
							
						}
					}
				}





				$this->render('update_p2',array(
				'model'=>$model,
				'platformsArray'=>$platformsArray,
				'devicesArray'=>$devicesArray,
				));
				$_SESSION['model-element']=$model;
			}
			Yii::app()->user->setFlash('error','');
		}else{
			$this->render('update',array(
			'model'=>$model,
			'platformsArray'=>$platformsArray,
			'devicesArray'=>$devicesArray,
			));
		}
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


			//if($this->loadModel($id)->delete()){
				Yii::app()->db->createCommand("DELETE FROM ELEMENT WHERE ID={$id}")->execute();
			//}

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
		$dataProvider=new CActiveDataProvider('Element');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Element('search');
		$model->unsetAttributes();  // clear any default values

		
		if (isset($_GET['Element'])) {
			$model->attributes=$_GET['Element'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Element the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Element::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}


	public function actionElements()
	{
		$model=new Element;
		$modelList=new Element('search');
		//$modelInst=new ElementInst('searchById');

		//$modelsPlatforms = Platforms::model()->findAllbySql('SELECT ID, NAME FROM PLATFORMS ORDER BY NAME');
		//$platformsArray = CHtml::listData($modelsPlatforms, 'ID', 'NAME');
		//var_dump($platformsArray);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['buttonCancel'])) {
			$this->redirect(array('admin'/*,'id'=>$model->ID*/));
		}

		if (isset($_POST['Element'])) {
			$model->attributes=$_POST['Element'];
			$model->setRelationRecords('platforms',is_array(@$_POST['Platforms']) ? $_POST['Platforms'] : array());
			/*GARENTE QUE O NOME DO ELEMENTO SEMPRE SEJA SALVO EM MAIÚSCULO*/
			$model->DESCRIPTION = strtoupper($model->DESCRIPTION);
			if ($model->save()) {
				$this->redirect(array('elements'/*,'id'=>$model->ID*/));
			}
		}

		$this->render('elements',array(
			'model'=>$model,
			'modelList'=>$modelList,
			//'modelInst'=>$modelInst,
			//'platformsArray'=>$platformsArray,
		));
	}


	/**
	 * Performs the AJAX validation.
	 * @param Element $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='element-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTeste(){

		$model=$this->loadModel(1);
		$modelList=new Element('search');

		$devicesArray = array();

		$count=0;
		$devicesArray=array();
		foreach ( $model->platforms as $platform ){
			echo $platform->id."<br/>" ;
			echo $platform->name."<br/>" ;
			/*$device= Yii::app()->db->createCommand('SELECT *
													  FROM Device
													  WHERE ID_PLATFORM='.$platform->id)->query();*/
			
			$device= Device::model()->findAllBySql('SELECT *
													  FROM Device
													  WHERE ID_PLATFORM='.$platform->id);
			//$data = CHtml::listData($device, 'ID', 'DESCRIPTION');
			var_dump($device);
			echo "<br/>";
			$devicesArray[$count] = $device;
			$count++;
			
		}

		echo "<br/>";
		var_dump($devicesArray);
			echo "<br/>";
			foreach ( $devicesArray as $key => $value ){
				echo $value[$key]->DESCRIPTION;
				echo "<br/>";

			}
			echo "<br/>";
		

		echo "
		<a href='http://localhost/mtcontrool/index.php/element/admin'>element/admin</a></br>
		<a href='http://localhost/mtcontrool/index.php/element/create'>element/create</a></br>
		<a href='http://localhost/mtcontrool/index.php/device/admin'>device/admin</a></br>
		<a href='http://localhost/mtcontrool/index.php/device/create'>device/create</a></br>
		<a href='http://localhost/mtcontrool/index.php/brand/admin'>brand/admin</a></br>
		<a href='http://localhost/mtcontrool/index.php/brand/create'>brand/create</a></br>
		";

		echo Yii::app()->user->getId()."<br/>";
		echo Yii::app()->user->getName();

		//$lista = Device::model()->findAll();
		$lista = Device::model()->findAll('ID_PLATFORM  = 3');
            
            $lista = CHtml::listData($lista,'ID','DESCRIPTION');

            //var_dump($lista);
            
            echo CHtml::tag('option',array('value' => ''), 'Select', TRUE);
            
            foreach($lista as $valor => $name){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($name),true);
            }

		/*$testModel=Element::model()->findAll();


		$cont=0;
		foreach($testModel as $value ){

			while( array_key_exists($cont, $value->elementPlatforms)){

				echo $value->elementPlatforms[$cont]->iDPLATFORM->name;
		 		echo "<br/>";
		 		$cont++;
			}
		 
		 $cont=0;
		}*/
	}


}