<?php

use common\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
                'class' => \yii\bootstrap5\LinkPager::class
        ],
        'columns' => [
            [
                    'attribute' => 'id',
                    'contentOptions' => ['style' => 'width: 80px;']
            ],
            [
                    'attribute' => 'fullname',
                    'content' => function($model){
                        return $model->firstname.' '.$model->lastname;
                    }
            ],
            'total_price:currency',
            //'email:email',
            //'transaction_id',
            'status:orderStatus',
            'created_at:datetime',
            //'created_by',
            //'paypal_order_id',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {delete}',
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
