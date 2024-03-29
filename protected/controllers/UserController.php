<?php

class UserController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
//public $layout='//layouts/column_2';

/**
* @return array action filters
*/
/*public function filters()



{
return array(
'accessControl', // perform access control for CRUD operations
'postOnly + delete', // we only allow deletion via POST request
);
}*/

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
/*public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}*/

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadInternModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new User;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['User']))
{
$model->attributes=$_POST['User'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
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
$model=$this->loadInternModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['User']))
{
$model->attributes=$_POST['User'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
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
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadInternModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
//$dataProvider=new CActiveDataProvider('User');
    $model = new User();
    $model->unsetAttributes();
    if(isset($_GET['User']))
    {
        $model->attributes = $_GET['User'];
    }
    $this->render('index',array(
    //'dataProvider'=>$dataProvider,
        'model'=>$model,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new User('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['User']))
$model->attributes=$_GET['User'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer $id the ID of the model to be loaded
* @return User the loaded model
* @throws CHttpException
*/
public function loadInternModel($id)
{
$model=User::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param User $model the model to be validated
*/
protected function performAjaxValidation($model)
{
    if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
}

    /*public function actionLogin(){
        $this->layout=false;
        $loginFormModel = new LoginForm();
        //print_r($_REQUEST);die;
        if(isset($_POST['LoginForm'])){
            $loginFormModel->attributes = $_POST['LoginForm'];
            if($loginFormModel->validate() && $loginFormModel->login()){
                Yii::app()->session['logintime'] = time();
                //$this->redirect(array('site/index'));
            }
        }
        $this->render('login',array('loginFormModel'=>$loginFormModel));
    }*/
    public function actionTest(){
        echo CPasswordHelper::hashPassword('123456');//$password
        die;
        $user = User::model();
        //$user->pwd
        $user->hashPassword();
    }
}
