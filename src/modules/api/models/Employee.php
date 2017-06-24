<?php

namespace frontend\modules\api\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $emp_name
 * @property string $emp_email
 * @property string $emp_company
 * @property int $emp_salay
 */
class Employee extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_name', 'emp_email', 'emp_salary'], 'required'],
            [['emp_salary'], 'integer'],
            [['emp_name', 'emp_email', 'emp_company'], 'string', 'max' => 100],
        ];
    }

    public function scenarios(){

        $scenarios = parent::scenarios();
        $scenarios['create'] = ['emp_name', 'emp_email', 'emp_company', 'emp_salary'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_name' => 'Emp Name',
            'emp_email' => 'Emp Email',
            'emp_company' => 'Emp Company',
            'emp_salary' => 'Emp Salary',
        ];
    }
}
