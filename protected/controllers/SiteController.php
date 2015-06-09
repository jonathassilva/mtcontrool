<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
                        'aclist'=>array(
                            'class'=>'application.extensions.EAutoCompleteAction',
                            'model'=>'Users', //My model's class name
                            'attribute'=>'name,id', //The attribute of the model i will search
                          ),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            $this->layout = "//layouts/main"; 
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
                
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        public function actionRegister(){
            
            
            $model = new ValidateRegister();
            
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'form'){
                echo CActiveForm::validate($model);
                Yii::app()->end();
                
            }
            
            
            if(isset($_POST['ValidateRegister'])){
                $model->attributes = $_POST['ValidateRegister'];
                if(!$model->validate()){
                    $model->addError('repeat_password','Error sending the form.');
                }
                else{
                    //Guardar Usuario
                    $guardar = new ConsultasDB();
                    $guardar->save_user(
                            $model->name,
                            $model->phone,
                            $model->email,
                            $model->user_name,
                            $model-> password);
                    //Enviar email
                }
                
            }
            
            $this->render('register', array('model' => $model));
            
        }
        
        
    public function actionRecuperarSenha(){

		$model=new RecuperaSenhaForm;
		if(isset($_POST['RecuperaSenhaForm']))
		{
			$model->attributes=$_POST['RecuperaSenhaForm'];    
			$user_name = $_POST['RecuperaSenhaForm']['user_name'];
                         
			if($model->validate())
			{
                $modelUsuario = Users::model()->findByAttributes(array('user_name'=>$user_name));
				if($modelUsuario){
					//$calendario = new Calendario;
					$email = $modelUsuario->email;
					$geradorDeSenha = new GeraSenha();
					$novaSenha = $geradorDeSenha->geraSenha(10);
					$modelUsuario->password = $novaSenha;
					$modelUsuario->save();
					$nome = $modelUsuario->name;
					//$data = $calendario->getData();
					//$hora = $calendario->getHora();
					$to = $email;
					$from = "sistemas@icomp.ufam.edu.br";
					$subject = "MTControol - New Password";
					$message = "<html>
							<h2>MTControol</h2>
							Olá, $nome.
							<br/>
                                                        This message is automatic. Please, don't reply .
							<br/>
							<br/>
							<br/>
							
                                                        Your new password is: <b>".$novaSenha."</b> 
							<br/>
							<br/>
							Click <a href='http://sistemas.icomp.ufam.edu.br/mtcontrool/'>aqui</a> to access the system.
							<br/>
							<br/>
							<br/>
							Thanks.
							<br/>
							<br/>
						</html>";
					$mail=Yii::app()->Smtpmail;
					$mail->SetFrom($from, 'no-reply - MTControol');
					$mail->Subject = $subject;
					$mail->MsgHTML($message);
					$mail->AddAddress($to, "");
					if(!$mail->Send()) {
						//echo 'alert("AVISO!\nUma mensagem foi enviada para o email cadastrado.")';
						$this->redirect('/mtcontrool',array('erro' => $mail->ErrorInfo));
						//echo "Mailer Error: " . $mail->ErrorInfo;
					}else{
						echo 'alert("AVISO!\nUma mensagem foi enviada para o email cadastrado.")';
						$this->redirect('login');
					}
				}else{
					$this->redirect('/mtcontrool');
				}
			}
		}
        else{
			$this->render('recuperarSenha',array('model'=>$model));
        }
    } 
}