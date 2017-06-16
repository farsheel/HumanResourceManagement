<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/

namespace app\components;
 
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\models\TblSalaryMapping;
use app\models\TblEmployee;
use app\models\TblSalaryParticular;
 
class Totalsal extends Component
{

	public function check($emp_id)
	{
		
			$salary_map=TblSalaryMapping::find()->where(['fk_int_emp_id' => $emp_id])->orderBy('fk_int_particular_id ASC')->all();
			if($salary_map==null)
			{
				return 0;
			}
			else
			{
				return 1;
			}
	}




	public function findsal($emp_id)
	{
		
			$salary_map=TblSalaryMapping::find()->where(['fk_int_emp_id' => $emp_id])->orderBy('fk_int_particular_id ASC')->all();
			$totalsalary=$this->salaryfactory($salary_map);
	 		return $totalsalary;
	}




	protected function salaryfactory($salary_map)
	{
		//storing base salary for the percentage calculation
		$amount=0;
		$base_sal=0;
			foreach ($salary_map as $key => $value)
			{
				// if the particular id is 1 then it is base salary and must be stored for percentage calculation.
				if($value->fk_int_particular_id==1) $base_sal=$value->int_value;
				$salary_particular = TblSalaryParticular::find()->where(['pk_int_particular_id' => $value['fk_int_particular_id']])->all();
				$salary_particular_details=$salary_particular[0];
				if($salary_particular_details->vchr_type=='Amount')
				{	
					if($salary_particular_details->vchr_calculation=='Addition')
					{
						$amount+=$value->int_value;
					}
					else if($salary_particular_details->vchr_calculation=='Subtraction')
					{
						$amount-=$value->int_value;
					}					
				}
				else if($salary_particular_details->vchr_type=='Percentage')
				{
					//calculating the specified percentage
					$percentage=$base_sal*$value->int_value;
					$percentage=$percentage/100;
					if($salary_particular_details->vchr_calculation=='Addition')
					{
						$amount+=$percentage;
					}
					else if($salary_particular_details->vchr_calculation=='Subtraction')
					{
						$amount-=$percentage;
					}
				}
			}
		return $amount;
	}
 
}
?>