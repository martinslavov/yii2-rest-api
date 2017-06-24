<?php
/**
 * @author Martin Slavov 
 * 
 * @desc All Employee logic is here
 * 
 */
namespace frontend\modules\api\controllers;

use frontend\modules\api\models\Employee;

/**
 * Employee controller
 */

class EmployeeController extends \yii\web\Controller
{
    //public $enableCsrfValidation = false;
    private $password = 'REST API KEY FOR linux-sys-adm.com';

    /**
    * Displays Employee page.
    *
    * @return string
    */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
    * Call Function befor action.
    */
    public function beforeAction($action) {
        
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);

    }

    /**
    * Decrypt API Key
    *
    * @return string
    */
    private function actionDecrypted($encrypted){

        $key = 'martinslavov algoritem';

        $data = base64_decode($encrypted);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $decrypted = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );

        return $decrypted;
    }


    ############ Employee item ################

    /**
     * Get all employee action.
     *
     * @return JSON
     */
    public function actionEmployeeList(){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
        $employee = Employee::find()->all();
        
        $data = \Yii::$app->request->get(); 
        $decrypted = $this->actionDecrypted($data['csrf']);

        if( $decrypted == $this->password ){
            if (count($employee) > 0 )
                return array('status' => true , 'data' => $employee );
            else
                return array('status' => false , 'data' => 'No employees found.');
        }else{
            return array('status' => false , 'data' => 'ERROR: 1001'); //ERROR: 1001 - your api key is missing or wrong - or something else ...
        }
    }

    /**
     * Get first employee action.
     *
     * @return JSON
     */
    public function actionEmployeeFirst(){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 

        $employee = Employee::find()
            ->where(['id' => 1])
            ->all();

        $data = \Yii::$app->request->get(); 
        $decrypted = $this->actionDecrypted($data['csrf']);

        if( $decrypted == $this->password ){
            if (count($employee) > 0 )
                return array('status' => true , 'data' => $employee );
            else
                return array('status' => false , 'data' => 'No employees found.');
        }else{
            return array('status' => false , 'data' => 'ERROR: 1001'); //ERROR: 1001 - your api key is missing or wrong - or something else ...
        }
    }

    /**
     * Get employee by company action.
     *
     * @param string $company - Name of company
     * @return JSON
     */
    public function actionEmployeeCompany($company, $csrf = ''){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = \Yii::$app->request->get(); 
        $employee = Employee::find()
            ->where(['emp_company' => $data])
            ->all();

        $decrypted = $this->actionDecrypted($data['csrf']);
        
        if( $decrypted == $this->password ){
            if (count($employee) > 0 )
                return array('status' => true , 'data' => $employee );
            else
                return array('status' => false , 'data' => 'No employees found.');
        }else{
            return array('status' => false , 'data' => 'ERROR: 1001'); //ERROR: 1001 - your api key is missing or wrong - or something else ...
        }
    }

    /**
     * POST employee by name action.
     *
     * @param string $name - Name of employee
     * @return JSON
     */
    public function actionEmployeeName(){

        //$this->beforeAction($this->action->id);

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = \Yii::$app->request->post(); 
        $decrypted = $this->actionDecrypted($data['csrf']);

        $employee = Employee::find()
            ->where(['emp_name' => $data['name']])
            ->AndWhere(['emp_email' => $data['email']])
            ->all();  

       if( $decrypted == $this->password ){
                   if (count($employee) > 0 )
            return array('status' => true , 'data' => $employee );
        else
            return array('status' => false , 'data' => 'No employees found.');
        }else{
            return array('status' => false , 'data' => 'ERROR: 1001'); //ERROR: 1001 - your api key is missing or wrong - or something else ...
        }
    }

    /**
     * Create employee action.
     *
     * @return JSON
     */
    public function actionEmployeeCreate(){

        //this will return response in json
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 

        $data = \Yii::$app->request->post(); 
        
        $employee = new Employee();
        $employee->scenario = Employee::SCENARIO_CREATE;
        $employee->attributes = \Yii::$app->request->post();

        $decrypted = $this->actionDecrypted($data['csrf']);
        
        if( $decrypted == $this->password ){
            if ( $employee->validate()) {
                $employee->save();
                return array('status' => true, 'data' => 'Employee created successfully.' );
            }else{
                return array('status' => false, 'data' => $employee->getErrors());
            }
        }else{
            return array('status' => false , 'data' => 'ERROR: 1001'); //ERROR: 1001 - your api key is missing or wrong - or something else ...
        }
       
    }
}