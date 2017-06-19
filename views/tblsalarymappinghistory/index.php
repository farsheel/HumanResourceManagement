<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use app\models\TblEmployee;
use app\models\TblSalaryMappingHistory;
use yii\widgets\DetailView;
use yii\db\Query;

use yii\widgets\ActiveForm;

$this->title = 'SALARY MAPPING HISTORY';
$this->params['breadcrumbs'][] = ['label' => 'MENU', 'url' => ['viewdata']];
$this->params['breadcrumbs'][] = $this->title;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="tbl-salary-mapping-history-index">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>
    <?=  DetailView::widget([
        'model' =>$model,
        'attributes' => [
        'pk_int_emp_id',
        'vchr_name'
          ,'vchr_gender',
'date_dob',
'vchr_email',
'vchr_mobile']
    ]);
        


?>

<?php
$a[]=null;$n=1;
    for($k=0;$k<count($models);$k++)
    {
     for($j=count($models1)-1;$j>=0;$j--)
     {

        for ($i=0; $i <count($a); $i++)
        { 
            if($models[$k]['vchr_particular_name']!=$a[$i])
            {
             if($models1[$j]['vchr_particular_name']==$models[$k]['vchr_particular_name'])
                {
                    echo "<BR><h3>".$n." . ".$models1[$j]['vchr_particular_name']." has incremented from ". $models1[$j]['int_amount']." to ".$models[$k]['int_value']." on ".$models[$k]['date_created']."</h3>";
                        $n=$n+1;
                        $a[$i]=$models[$k]['vchr_particular_name'];
                }
            
            }

        }
        }
        }
  
  

    



 for ($i=0; $i <count($models1)-1 ; $i++) { 
    
    if($models1[$i]['vchr_particular_name']==$models1[$i+1]['vchr_particular_name'])
    {
         
    
        echo "<BR><h3>".$n.". ".$models1[$i]['vchr_particular_name']." has incremented from ". $models1[$i]['int_amount']." to ".$models1[$i+1]['int_amount']." on ".$models1[$i]['date_created']."</h3>";
    $n=$n+1;

     }
    }
 ?>



    

 