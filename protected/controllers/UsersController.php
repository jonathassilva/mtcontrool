<?php
use app\models\FormRecoverPass;
 
class UsersController extends Controller
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
                'actions'=>array('register','edit','recoverpass','changepassword','profile'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','admin','delete','index','view'),
                'expression'=>'$user->isAdmin()',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array(),
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
        $model=new Users;
 
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
 
        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            if($model->beforeSave()){
                
                if($model->save()){
               // Yii::app()->user->setFlash('success', "Form posted!");
                $this->redirect(array('view','id'=>$model->id));
                }
            }
        }
        
        
 
            $this->render('create',array(
                'model'=>$model,
                ));
        }
 
         
         
         
    /*public function actionCreate()
    {
        $model=new Users;
 
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
 
        if (isset($_POST['Users'])) {
            $model->attributes=$_POST['Users'];
            if ($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }
        }
 
        $this->render('create',array(
            'model'=>$model,
        ));
    }*/
 
        public function actionRegister()
    {
        $model=new Users;
 
        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);
 
        if (isset($_POST['Users'])) {
            $model->attributes=$_POST['Users'];
            if ($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }
        }
 
        $this->render('register',array(
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
 
        if (isset($_POST['Users'])) {
            $model->attributes=$_POST['Users'];
            if ($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }
        }
 
        $this->render('update',array(
            'model'=>$model,
        ));
    }
 
    public function actionProfile(){
            $userId = Yii::app()->user->id; 
            
             $model=$this->loadModel($userId);
 
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
 
        if (isset($_POST['Users'])) {
            $model->attributes=$_POST['Users'];
            if ($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }
        }
 
        $this->render('profile',array(
            'model'=>$model,
        ));
            
            
        }
        
    
    
    public function actionEdit($id)
    {
        $model=$this->loadModel($id);
 
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
 
        if (isset($_POST['Users'])) {
            $model->attributes=$_POST['Users'];
            if ($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }
        }
 
        $this->render('edit',array(
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
        $dataProvider=new CActiveDataProvider('Users');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }
 
    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Users('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Users'])) {
            $model->attributes=$_GET['Users'];
        }
 
        $this->render('admin',array(
            'model'=>$model,
        ));
    }
 
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Users::model()->findByPk($id);
        if ($model===null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        return $model;
    }
 
    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax']==='users-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
         
 
    public function actionChangepassword()
    {      
   
    $model = new ChangePasswordForm;
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if(isset($_POST['ChangePasswordForm']))
    {
      $model->attributes=$_POST['ChangePasswordForm'];
      // Validar input do user.
      if($model->validate() && $model->changePassword())
      {
       Yii::app()->user->setFlash('success', ' Your password was changed.');
       $this->redirect( $this->action->id );
      }
    }
    // Mostrar formulario.
    $this->render('changepassword',array('model'=>$model));
  
    }
    
    
    

    
    
}