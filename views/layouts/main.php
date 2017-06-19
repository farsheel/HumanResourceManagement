<?php
/*
*last edited : 19/6/2017 1:37 Am
*By vishnu prasad
*added hover drop down to menu
*/
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'HRM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

//registering css required for hover menu
    $this->registerCss("
.dropbtn {
    background-color: #222222;
    color: #9D9D9D;
    padding: 15px;
    font-size: 14px;
    border: none;
    cursor: pointer;
}


.dropdown {
    position: relative;
    display: inline-block;
}


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}


.dropdown-content a {
    color: black;
    padding: 8px 8px;
    text-decoration: none;
    display: block;
}


.dropdown-content a:hover {background-color: #A8B9A8}


.dropdown:hover .dropdown-content {
    display: block;
}


.dropdown:hover .dropbtn {
    background-color: #222222;
    color: white;
    size:20;
}");


//getting all menu items based on logined or not
$menu_bar='<div class="navbar-nav navbar-right">';

$menu_bar=Yii::$app->user->isGuest ?($menu_bar.""): ($menu_bar.
    '<div class="dropdown">
          <button class="dropbtn">Master Entries</button>
          <div class="dropdown-content">
            <a href="index.php?r=department/index">Manage Departmens</a>
            <a href="index.php?r=designation/index">Manage Designation</a>
          </div>
</div>');

$menu_bar=Yii::$app->user->isGuest ?($menu_bar.""): ($menu_bar.
    '<div class="dropdown">
          <button class="dropbtn">Manage Employee</button>
          <div class="dropdown-content">
            <a href="index.php?r=employee/index">Enroll Employee</a>
            <a href="index.php?r=salary-map/index">Salary Mapping</a>
            <a href="index.php?r=salary/index">Salary Particulars</a>
            <a href="index.php?r=salary-history/index">Salary Appraisal</a>
          </div>
</div>');

$menu_bar=Yii::$app->user->isGuest ?($menu_bar.""): ($menu_bar.
    '<div class="dropdown">
          <button class="dropbtn">Manage Payroll</button>
          <div class="dropdown-content">
            <a href="index.php?r=payroll/index">Generate Payroll</a>
          </div>
</div>');

$menu_bar=Yii::$app->user->isGuest ?($menu_bar.""): ($menu_bar.
    '<div class="dropdown">
          <button class="dropbtn">Manage Leave</button>
          <div class="dropdown-content">
            <a href="index.php?r=leave/index">Allow Leave</a>
          </div>
</div>');

$menu_bar.='</div>';

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->vchr_email . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);

    //printing hover menu
    echo $menu_bar;

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
