<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\api\modules\v1\models\Category::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'product_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\api\modules\v1\models\Product::find()->all(),'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
