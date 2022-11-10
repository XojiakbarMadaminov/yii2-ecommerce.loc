<?php

namespace common\i18n;
use common\models\Order;

/**
 * @package  common\i18n
 */

class Formatter extends \yii\i18n\Formatter
{
    public function asOrderStatus($status)
    {
            if ($status == Order::STATUS_COMPLETED){
                return \yii\bootstrap5\Html::tag('span','Paid',['class' => 'badge badge-success']);
            }else if ($status == Order::STATUS_DRAFT){
                return \yii\bootstrap5\Html::tag('span','Unpaid',['class' => 'badge badge-secondary']);
            }else{
                return \yii\bootstrap5\Html::tag('span','Failured',['class' => 'badge badge-danger']);
            }
    }

}