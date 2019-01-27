<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_category',
            'name',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'delete' => function($url, $model) {
                    return $model->hasProducts($model->id_category) != '' ? '' : Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_category],[
                        'class' => '',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this Category?',
                            'method' => 'post',
                        ]
                    ]);
                }
            ],
        ],
        ],
    ]); ?>
</div>
