<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\jui\JuiAsset;





/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form','options' => ['enctype' => 'multipart/form-data'],]); ?>

    <?= $form->field($model, 'vchr_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'vchr_gender')->radioList(array('Male'=>'Male','Female'=>'Female','Other'=>'Other')); ?>
    
    
    <?= $form->field($model, 'date_dob')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <?= $form->field($model, 'vchr_email')->textInput(['maxlength' => true,'size'=>20]) ?>

    <?= $form->field($model, 'vchr_nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_address')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'file')->fileInput() ?>


 
    <?=
        $form->field($model, 'fk_int_dep_id')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\TblDepartment::find()->asArray()->all(), 'pk_int_dep_id', 'vchr_department'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Department ...'],
   
]);
    ?>
    <?=
        $form->field($model, 'fk_int_designation_id')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\TblDesignation::find()->asArray()->all(), 'pk_int_designation_id', 'vchr_designation'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Designation...'],
    
]);
    ?>

    <?=
        $form->field($model, 'fk_int_user_type')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\TblUserType::find()->asArray()->all(), 'pk_int_user_type_id', 'vchr_user_type'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select User Type...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?>



<div class="row">    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tasks"></i> Experiences</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin(['id' => 'dynamic-form',
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelExperience[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    //'fk_int_emp_id',
                    'vchr_company',
                    'vchr_period',
                    'vchr_designation',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelExperience as $i => $modelExperience): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Experience</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelExperience->isNewRecord) {
                                echo Html::activeHiddenInput($modelExperience, "[{$i}]fk_int_emp_id");
                            }
                        ?>
                        
                        <div class="row">
                        <div class="col-sm-4">
                                <?= $form->field($modelExperience, "[{$i}]vchr_designation")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelExperience, "[{$i}]vchr_period")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelExperience, "[{$i}]vchr_company")->textInput(['maxlength' => true]) ?>
                            </div>
                            
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
</div>
        
<div class="row">
    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tasks"></i> Qualifications</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin(['id' => 'dynamic-form',
                'widgetContainer' => 'dynamicform_qwrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-qitems', // required: css class selector
                'widgetItem' => '.qitem', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-qitem', // css class
                'deleteButton' => '.remove-qitem', // css class
                'model' => $modelQualification[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    //'fk_int_emp_id',
                    'vchr_qualification',
                    'vchr_institute',
                    'float_percentage',
                    'vchr_passout_year',
                ],
            ]); ?>

            <div class="container-qitems"><!-- widgetContainer -->

            <?php foreach ($modelQualification as $i => $modelQualification): ?>
                <div class="qitem panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Qualification</h3>
                        <div class="pull-right">
                            <button type="button" class="add-qitem btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-qitem btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelQualification->isNewRecord) {
                                echo Html::activeHiddenInput($modelQualification, "[{$i}]fk_int_emp_id");
                            }
                        ?>
                        
                        <div class="row">
                        <div class="col-sm-4">

                                <?= $form->field($modelQualification, "[{$i}]vchr_qualification")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelQualification, "[{$i}]vchr_institute")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelQualification, "[{$i}]vchr_passout_year")->textInput(['maxlength' => true]) ?>
                            </div>
                             <div class="col-sm-2">
                                <?= $form->field($modelQualification, "[{$i}]float_percentage")->textInput(['maxlength' => true]) ?>
                            </div>
                            
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
</div>
    








    <div class="row">    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tasks"></i> Documents</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin(['id' => 'dynamic-form',
                'widgetContainer' => 'dynamicform_dwrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-ditems', // required: css class selector
                'widgetItem' => '.ditem', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-ditem', // css class
                'deleteButton' => '.remove-ditem', // css class
                'model' => $modelDocuments[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    //'fk_int_emp_id',
                    'vchr_document_title',
                    'vchr_document_description',
                    'file',
                ],
            ]); ?>

            <div class="container-ditems"><!-- widgetContainer -->
            <?php foreach ($modelDocuments as $i => $modelDocuments): ?>
                <div class="ditem panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Documents</h3>
                        <div class="pull-right">
                            <button type="button" class="add-ditem btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-ditem btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDocuments->isNewRecord) {
                                echo Html::activeHiddenInput($modelDocuments, "[{$i}]fk_int_emp_id");
                            }
                        ?>
                        
                        <div class="row">
                        <div class="col-sm-4">
                                <?= $form->field($modelDocuments, "[{$i}]vchr_document_title")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelDocuments, "[{$i}]vchr_document_description")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">

                                <?php if (!$modelDocuments->isNewRecord): ?>
                            <?= Html::activeHiddenInput($modelDocuments, "[{$i}]vchr_document"); ?>                          
                            <?php endif; ?>
                                <?= $form->field($modelDocuments, "[{$i}]file")->fileinput() ?>

                            </div>
                            
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
</div>












    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
