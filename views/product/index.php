<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="product-index">

        <h1>
            <?= Html::encode($this->title) ?>
        </h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product',
            ['label' => 'Category',
             'attribute' => 'id_category',
             'value' => 'category.name'],
            'name',
            'stock',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'delete' => function($url, $model) {
                    return $model->hasEntries($model->id_product) != '' ? '' : Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_product], [
                        'class' => '',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this Product?',
                            'method' => 'post',
                        ]
                    ]);
                }
            ],
        ],
    ]]); ?>
    </div>
