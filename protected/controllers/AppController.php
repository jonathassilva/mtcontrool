<?php

class AppController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('view','update','create','delete','share','retorna'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('manage'),
				'expression'=>'$user->isAdmin()',
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin'),
				'expression'=>'$user->isTester()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','update','create','manage','delete'),
				'users'=>array('admin'),
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
                $model=new App('view');
            
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
		$model=new App;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['App'])) {
			$model->attributes=$_POST['App'];
			$model->setAttribute('id_users', Yii::app()->user->id);
                       
			//salvando a relacao com a tabela Platforms
			$model->setRelationRecords('platforms',is_array(@$_POST['Platforms']) ? $_POST['Platforms'] : array());
			//salvando a relacao com a tabela Languages
			$model->setRelationRecords('languages',is_array(@$_POST['Languages']) ? $_POST['Languages'] : array());
			//salvando a relacao com a tabela category
                        $model->setRelationRecords('category',is_array(@$_POST['Category']) ? $_POST['Category'] : array());
			//salvando a relacao com a tabela share
                      //  $model->setRelationRecords('appUsers',  is_array($_POST['AppUsers']) ? $_POST['AppUsers'] : array());
                        
			if ($model->save()) {
				//$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('runs/create', 'id' => $model->id));
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

		if (isset($_POST['App'])) {
			$model->attributes=$_POST['App'];
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
		$dataProvider=new CActiveDataProvider('App');
                
                $criteria = new CDbCriteria();
                
                $userId = Yii::app()->user->id;
                //$userLevel = Users::model()->level;
               // $sql = Users::model ()->findBySql ( 'SELECT level from users WHERE id ='.$userId );
               // $sql =  'SELECT level from users WHERE id ='.$userId ;
                $connection = Yii::app ()->db;
                $command = $connection->createCommand ( 'SELECT level from users WHERE id ='.$userId );
                $rowCount = $command->execute ();
                
                $criteria->addCondition(array("condtion"=>"id_users = $userId"));
                $criteria->addCondition(array("condtion"=>"$rowCount = '0'"));
               
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
         //    $user = Yii::app()->user->id;
            
		$model=new App('search');
                
		$model->unsetAttributes();  // clear any default values
		
                
                if (isset($_GET['App'])) {
			$model->attributes=$_GET['App'];
                        
		}
                
                
              
		$this->render('admin',array(
			'model'=>$model,
                        
		));
	
            
                }

                
                public function actionManage()
	{
         //    $user = Yii::app()->user->id;
            
		$model=new App('searchAdmin');
                
		$model->unsetAttributes();  // clear any default values
		
                if (isset($_GET['App'])) {
			$model->attributes=$_GET['App'];
		}
              
		$this->render('manage',array(
			'model'=>$model
		));
	
            
                }
                
                public function actionShare($id){
                    $model = new App();
                    
                    
                     //   $model->attributes=$_POST['AppUsers'];
			//$model->setAttribute('id_users', Yii::app()->user->id);
                        //$model->setAttribute('id_app',$id);
			
			//salvando a relacao com a tabela share
                        //$model->setRelationRecords('appUsers',  is_array($_POST['AppUsers']) ? $_POST['AppUsers'] : array());
                        
                   /* $model->setAttribute('id_users', $id);
                    if (isset($_POST['App'])) {
			$model->attributes=$_POST['App'];
               
                 //$model->setRelationRecords('share',  is_array($_POST['Search']) ? $_POST['Sarch'] : array());
			if ($model->save()) {
				$this->redirect(array('share','id'=>$model->id));
			}
		}
                    */
                    
                    $this->render('share',array(
			'model'=>$model
		));
                    
                }
                
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return App the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=App::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param App $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='app-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        
        
        
        
                }

