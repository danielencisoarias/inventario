<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductEntry */

$this->title = 'Update Product Entry: ' . $model->id_product_entry;
$this->params['breadcrumbs'][] = ['label' => 'Product Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_product_entry, 'url' => ['view', 'id' => $model->id_product_entry]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-entry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
