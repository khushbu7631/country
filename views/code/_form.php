<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\CountryCode */
/* @var $form yii\widgets\ActiveForm */

$countries = ArrayHelper::map(\frontend\models\CountryName::find()->asArray()->all(), 'id', 'c_name');
$codes= ArrayHelper::map(\frontend\models\CountryCode::find()->asArray()->all(), 'id',  'code');
?>

<div class="country-code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_id')->dropDownList(
         $countries,
             ['prompt'=>'Select a country',
                 'onchange'=>'
               $.post("index.php?r=code/country-list&id="+$(this).val(), function( data ) {
                 $( "select#code" ).html( data );
               });
           ']);?>

    <?= $form->field($model, 'code')->dropDownList(
           $codes,
                ['prompt'=>'select code','id'=>'code']
                 ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
