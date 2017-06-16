<?php


/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/

use Yii\app\request\baseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblSalaryParticular;
use app\models\TblEmployee;
use yii\bootstrap\Alert;
use kartik\select2\Select2;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMapping */
/* @var $form yii\widgets\ActiveForm */
?>

<script>
    function Ajax(a){
        
            var int_id=parseInt(a);
            resetAllValues();

        $.ajax({
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('salary-map/ajax') ?>',
            type: 'POST',
             data: { test: int_id },
             success: function(data) {
                myArr = JSON.parse(data);
                var dataArray=myArr[0];
                dataArray.forEach(myFunction);

             }
         });

        
    }



    function myFunction(item, index) {
        document.getElementById(item.id).value=item.value;
    }

    function resetAllValues() {
        $('.tbl-salary-mapping-form').find('input:text').val('');
    }


</script>


<div class="tbl-salary-mapping-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- making combo box to display employee name
    	 return the employee id on selection -->
    <?= $form->field($model, 'fk_int_emp_id')->label('Employee Name')->widget(Select2::classname(), 
    	[
            'name' => 'combo',
		    'data' => $employee_name,
		    'language' => 'en',
		    'options' => ['placeholder' => 'Select Employee...'],
		    'pluginOptions' => [
		    'allowClear' => true
		        ],
            'pluginEvents' => [
                            "change" => "function() { Ajax($(this).val()); }",//log('change')
                            // "select2:opening" => "function() { log('select2:opening'); }",
                            // "select2:open" => "function() { log('open'); }",
                            // "select2:closing" => "function() { log('close'); }",
                            // "select2:close" => "function() { log('close'); }",
                            // "select2:selecting" => "function() { log('selecting'); }",
                            // "select2:select" => "function() { log('select'); }",
                            // "select2:unselecting" => "function() { log('unselecting'); }",
                            // "select2:unselect" => "function() { log('unselect'); }"
                            ],
		]);
    ?>

	<?php
	//checking if there is any salary particulars added to database for creating mapping
		if(sizeof($items)==0)
		    {
		    	// if there is no salary particular added then alert user to add salary particulars first
		        echo Alert::widget(['options' => ['class' => 'alert-info',],'body' => 'You must have at leat one salary particular',]);
		        return;
		    }

    		/*
    		*The inputs are stored inside an array as the number of text fields are dynamically created
    		*$key is the index of the array which is keys of the provided array as well as the particular id
    		*creating dynamic number of text fields same to the number of salary particulars
    		*then submiting form the input array is posted to controller
            */
            foreach ($items as $key => $value) 
            {
             echo $form->field($model, "[{$key}]int_value")->textInput(['maxlength' => true , 'id' => $key])->label($value."(".$particular_type[$key].")");
            }
    ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
