<?php
class RunsController extends Controller {

	/**
	 * using two-column layout.
	 * See 'protected/views/layouts/column2.php'.
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 */
	 public $layout = '//layouts/main';

	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete'
		); // we only allow deletion via POST request

	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules() {
		return array (
                array (
                                'allow', // allow all users to perform 'index' and 'view' actions
                                'actions' => array ('index','view','passTestRun','failTestRun','quest',
                                                'saveAndroidQuest','saveIOSQuest','saveWPQuest','rodada',
                                ),
                                'users' => array (
                                                '*'
                                )
                ),
                array (
                                'allow', // allow authenticated user to perform 'create' and 'update' actions
                                'actions' => array ('create','update','delete'),

                                'users' => array ('@')
                ),
                array (
                                'allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions' => array ('admin'),
                                'expression'=>'$user->isAdmin()',


                ),
                array (
                                'deny', // deny all users
                                'users' => array (
                                                '*'
                                )
                        )
        );
}

	/**
	 * Displays a particular model.
	 *
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */



	public function actionView($id) {
		$model = $this->loadModel ( $id );

		$sql = "SELECT tr.id as IDTestRun, c.name as NomeCriterio, tc.num as NumeroTeste, tc.name as NomeTeste, tc.description as Descricao, tc.notes as Notas, tc.steps as Passos, tc.result as Resultado, tr.status as Status
    			FROM criteria as c, test_case as tc, test_run as tr
    			WHERE tr.id_test_case = tc.id AND tr.id_runs = '$id' AND c.id = tc.id_criteria";

		$rawData = Yii::app ()->db->createCommand ( $sql )->queryAll ();
		/*
		 * $dataProvider=new CArrayDataProvider($rawData, array(
		 * //'id'=>'user',
		 * 'sort'=>array(
		 * 'attributes'=>array(
		 * 'IDTestRun','NomeCriterio', 'NumeroTeste', 'NomeTeste', 'Descricao', 'Notas', 'Passos', 'Resultado', 'Status'
		 * ),quantidade
		 * ),
		 * ));
		 */

		$nomeApp = App::model ()->findByPk ( $model->id_app );
		$nomePlataforma = Platforms::model ()->findByPk ( $model->id_platform );
		$quantidadePass = count ( TestRun::model ()->findAllByAttributes ( array (
				'status' => 1,
				'id_runs' => $id
		) ) );

		$quantidadeFail = count ( TestRun::model ()->findAllByAttributes ( array (
				'status' => 2,
				'id_runs' => $id
		) ) );

		$quantidadePending = count ( TestRun::model ()->findAllByAttributes ( array (
				'status' => 0,
				'id_runs' => $id
		) ) );

		// recupera os testes de determinada rodada1
		$testRuns = TestRun::model ()->findAllByAttributes ( array (
				'id_runs' => $id
		) );

		$quantidadeTotal = count ( $testRuns );

		$this->render ( 'view', array (
				'model' => $model,
				'testRuns' => $testRuns,
				'nomeApp' => $nomeApp->name,
				'nomePlataforma' => $nomePlataforma->name,
				'dados' => $rawData,
				'quantidadePass' => $quantidadePass,
				'quantidadeFail' => $quantidadeFail,
				'quantidadePending' => $quantidadePending,
				'quantidadeTotal' => $quantidadeTotal,
		)
		 );
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {

		$model = new Runs ();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		// @todo refactoring

		if (isset ( $_POST ['Runs'] )) {


			$model->attributes = $_POST ['Runs'];

                        $id_cri = $_POST['Runs']['id_app'];

                        $value = 0;

                      $connection=Yii::app()->db;
                       $sql1 = "SELECT id_order FROM runs WHERE id_app = " . $id_cri . " ORDER BY id DESC LIMIT 1";

                     //  $tenta = Yii::app ()->db->createCommand ( $sql )->queryAll ();
                        $command=$connection->createCommand($sql1);
                       $tenta=$command->query();
                       // $resultado = (integer)$tenta;

                       foreach($tenta AS $result){
                        $value = $result['id_order'];

                     }

                        $model->setAttribute('id_order',($value + 1));


                        $model->setAttribute('id_users', Yii::app()->user->id);

			if ($model->save ()) {
				// $this->redirect(array('view', 'id' => $model->id));
				$this->redirect ( array (
						'runs/quest',
						'id' => $model->id
				) );
			}
		}

		$this->render ( 'create', array (
				'model' => $model
		) );
                }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */

	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset ( $_POST ['Runs'] )) {
			$model->attributes = $_POST ['Runs'];
			if ($model->save ()) {
				$this->redirect ( array (
						'view',
						'id' => $model->id
				) );
			}
		}

		$this->render ( 'update', array (
				'model' => $model
		) );
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 *
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if (Yii::app ()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel ( $id )->delete ();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (! isset ( $_GET ['ajax'] )) {
				$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
						'admin'
				) );
			}
		} else {
			throw new CHttpException ( 400, 'Invalid request. Please do not repeat this request again.' );
		}
	}

	/**
	 * Lists all models.
	 */


	public function actionIndex() {

            $model = new Runs ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Runs'] )) {
			$model->attributes = $_GET ['Runs'];
		}

                $criteria = new CDbCriteria();
                $userId = Yii::app()->user->id;



                if(isset($_GET['q']))
                    {

                    $q = $_GET['q'];

                    $modelApp = App::model()->findByAttributes(array('name'=>$q));

                    if($modelApp){
                        $id = $modelApp->id;
                    }

                    $criteria->compare('id_app', $id, true, 'OR');



                  //  $criteria->compare('id_order', $q, true, 'OR');
                    }


                $connection=Yii::app()->db;
                $MY = "SELECT id_app FROM app_users WHERE id_users =".$userId;
                $commando=$connection->createCommand($MY);
                $tentativa=$commando->query();



                foreach ($tentativa as $vamo){
                    $value = $vamo['id_app'];
                    $criteria->compare('id_app', $value, true, 'OR');

                   // $criteria->addCondition(array("condtion"=>"id_app = $value"));

                }

               // $criteria->condition = "$value = runs.id_app";

               // $criteria->compare('id_app', $value, true, 'OR');
                $criteria->addCondition(array("condtion"=>"id_users = $userId"));

                $dataProvider = new CActiveDataProvider ( 'Runs',array(
                'criteria' => $criteria,

                'sort'=>array(
                    'attributes'=>array(
                          'id_app',

                    ),
                'defaultOrder' => 'id_app',
                ),

                'pagination' => array(
                'pagesize' => 30,
                ),

                ) );


		$this->render ( 'index', array (
                                 'model' => $model,
				'dataProvider' => $dataProvider,

		)  );




	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Runs ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Runs'] )) {
			$model->attributes = $_GET ['Runs'];
		}

		$this->render ( 'admin', array (
				'model' => $model
		) );
	}

        public function actionRodada($id) {
		//$model = $this->loadModel ( $id );

               // echo $id;
                $model = new Runs ('rod');
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Runs'] )) {
			$model->attributes = $_GET ['Runs'];


		}
                $criteria = new CDbCriteria();
                $dataProvider = new CActiveDataProvider ( 'Runs',array(
                'criteria' => $criteria,

                ) );
                $criteria->addCondition(array("condtion"=>"id_app = $id"));



               // $criteria->compare('id_app', $id, true, 'OR');
		$this->render ( 'adminRuns', array (
                    'id'=>$id,
				'model' => $model,
                    'dataProvider' => $dataProvider,
		) );
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id
	 *        	the ID of the model to be loaded
	 * @return Runs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Runs::model ()->findByPk ( $id );

		if ($model === null) {
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 *
	 * @param Runs $model
	 *        	the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'runs-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}

	/**
	 * Updata a test run to aprooved.
	 *
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionPassTestRun($id) {
		$model = TestRun::model ()->findByPk ( $id );

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->setAttribute ( 'status', 1 );

		if ($model->save ()) {
			$this->redirect ( array (
					'view',
					'id' => $model->id_runs
			) );
		}

		$dataProvider = new CActiveDataProvider ( 'Runs' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider
		) );
	}

	/**
	 * Updata a test run to reprooved.
	 *
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionFailTestRun($id) {
		$model = TestRun::model ()->findByPk ( $id );

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->setAttribute ( 'status', 2 );

		if ($model->save ()) {
			$this->redirect ( array (
					'view',
					'id' => $model->id_runs
			) );
		}

		$dataProvider = new CActiveDataProvider ( 'Runs' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider
		) );
	}
	public function actionQuest($id) {

            // $this->layout = "//layouts/column2";
		$run = Runs::model ()->findByPk ( $id );
		$plataforma = Platforms::model ()->findByPk ( $run ['id_platform'] );

		if ($plataforma->name == "Android") {
			$this->render ( 'quest', array (
					'id' => $id,
					'plataforma' => 'Android'
			) );
		} else if ($plataforma->name == "iOS") {
			$this->render ( 'quest', array (
					'id' => $id,
					'plataforma' => 'iOS'
			) );
		} else if ($plataforma->name == "Windows Phone") {
			$this->render ( 'quest', array (
					'id' => $id,
					'plataforma' => 'Windows Phone'
			) );
		}
	}
	public function actionSaveAndroidQuest($id) {
		$run = Runs::model ()->findByPk ( $id );
		$plataforma = Platforms::model ()->findByPk ( $run ['id_platform'] );

		// array com os testes default
		$defaultTestsKeys = array (
				'1.1',
				'1.2',
				'1.3',
				'1.4',
				'2.2',
				'2.3',
				'2.4',
				'5.3',
				'6.1',
				'6.2',
				'6.3',
				'7.1',
				'7.2',
				'7.3',
				'7.4',
				'7.5',
				'7.6',
				'7.7',
				'7.8',
				'7.9',
				'7.15',
				'7.16',
				'8.1',
				'8.3',
				'8.4',
				'9.1',
				'9.2',
				'9.3',
				'12.1',
				'12.2',
				'15.1',
				'15.2'
		);

		// consertar essa gambiarra URGENTE
		foreach ( $defaultTestsKeys as $key ) {
			$testRuns = TestCase::model ()->findBySql ( "SELECT id FROM `test_case`AS tc, `test_platform` AS tp WHERE tc.num = '" . $key . "' AND tp.id_platform = " . $plataforma->id . " AND tp.id_test_case = tc.id" );
			// var_dump($testRuns);
			if ($testRuns ["id"] != "") {
				$id_testcase = $testRuns ["id"];
				// echo $testRuns["id"]."<br/>";
				$id_runs = $id;
				$connection = Yii::app ()->db;
				$command = $connection->createCommand ( "INSERT INTO `test_run`(`id_runs`, `id_test_case`, `status`) VALUES (" . $id_runs . "," . $testRuns ["id"] . ",0)" );
				$rowCount = $command->execute ();
			}
		}

		$this->redirect ( array (
				'view',
				'id' => $id
		) );
	}
	public function actionSaveIOSQuest($id) {
		$run = Runs::model ()->findByPk ( $id );
		$plataforma = Platforms::model ()->findByPk ( $run ['id_platform'] );
		// array com os testes default
		$defaultTestsKeys = array (
				1.1,
				1.2,
				1.4,
				1.5,
				5.3,
				6.3,
				7.1,
				7.2,
				7.3,
				7.4,
				7.5,
				7.6,
				7.7,
				7.8,
				7.9,
				7.15,
				7.16,
				8.1,
				8.3,
				8.4,
				9.1,
				9.2,
				9.3,
				11.2,
				12.1,
				12.2,
				14.1,
				14.2,
				15.1,
				15.2,
				19.1,
				20.1,
				22.1,
				22.2
		);

		// pegar os ID,s selecionados
		// verificar inde tem virgula
		// montar uma lista com todos os compostos
		// replicar esse codigo abaixo

		// consertar essa gambiarra URGENTE
		foreach ( $defaultTestsKeys as $key ) {
			$testRuns = TestCase::model ()->findBySql ( 'SELECT * FROM `test_case` where num = ' . $key );
			if ($testRuns ["id"] != "") {
				$id_testcase = $testRuns ["id"];
				// echo $testRuns["id"]."<br/>";
				$id_runs = $id;
				$connection = Yii::app ()->db;
				$command = $connection->createCommand ( "INSERT INTO `test_run`(`id_runs`, `id_test_case`, `status`) VALUES (" . $id_runs . "," . $testRuns ["id"] . ",0)" );
				$rowCount = $command->execute ();
			}
		}

		$this->redirect ( array (
				'view',
				'id' => $id
		) );
	}
	public function actionSaveWPQuest($id) {
		$run = Runs::model ()->findByPk ( $id );
		$plataforma = Platforms::model ()->findByPk ( $run ['id_platform'] );
		// array com os testes default
		$defaultTestsKeys = array (
				1.1,
				1.2,
				1.3,
				2.1,
				2.2,
				2.3,
				2.4,
				5.1,
				5.2,
				5.3,
				5.4,
				7.3,
				7.4,
				7.5,
				7.6,
				7.7,
				8.1,
				8.2,
				8.3,
				8.4,
				8.5
		);

		// pegar os ID,s selecionados
		// verificar inde tem virgula
		// montar uma lista com todos os compostos
		// replicar esse codigo abaixo

		// consertar essa gambiarra URGENTE
		foreach ( $defaultTestsKeys as $key ) {
			$testRuns = TestCase::model ()->findBySql ( 'SELECT * FROM `test_case` where num = ' . $key );
			if ($testRuns ["id"] != "") {
				$id_testcase = $testRuns ["id"];
				// echo $testRuns["id"]."<br/>";
				$id_runs = $id;
				$connection = Yii::app ()->db;
				$command = $connection->createCommand ( "INSERT INTO `test_run`(`id_runs`, `id_test_case`, `status`) VALUES (" . $id_runs . "," . $testRuns ["id"] . ",0)" );
				$rowCount = $command->execute ();
			}
		}

		$this->redirect ( array (
				'view',
				'id' => $id
		) );
	}



                }
