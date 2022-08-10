<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CountryCode */

$this->title = 'Create Country Code';
$this->params['breadcrumbs'][] = ['label' => 'Country Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
