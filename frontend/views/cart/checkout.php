<?php
/**
 * @var \common\models\Order $order
 * @var \common\models\OrderAddress $orderAddress
 * @var array $cartItems
 * @var int $productQuantity
 * @var float $totalPrice
 */

use yii\bootstrap5\ActiveForm;

?>


<?php $form = ActiveForm::begin([
    'id' => 'checkout-form',
//    'action' => ['/cart/submit-order']

]); ?>
<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-header">
                Account information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($order, 'firstname')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($order, 'lastname')->textInput(['autofocus' => true]) ?>

                    </div>
                </div>

                <?= $form->field($order, 'email')->textInput(['autofocus' => true]) ?>

            </div>

        </div>
        <div class="card">
            <div class="card-header">
                Address Information
            </div>
            <div class="card-body">
                <?= $form->field($orderAddress, 'address') ?>
                <?= $form->field($orderAddress, 'city') ?>
                <?= $form->field($orderAddress, 'state') ?>
                <?= $form->field($orderAddress, 'country') ?>
                <?= $form->field($orderAddress, 'zipcode') ?>

            </div>
        </div>


    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Order Summary</h4>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo \common\models\Product::formatImageUrl($item['image'])?>" alt="<?php echo $item['name']?>"
                                     style="width: 50px">
                            </td>
                            <td><?php echo $item['name']?></td>
                            <td><?=$item['quantity']?></td>
                            <td><?php echo Yii::$app->formatter->asCurrency($item['price']) ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <hr>
                <table class="table">
                    <tr>
                        <td>Total Items</td>
                        <td class="float-end"><?= $productQuantity > 1 ? $productQuantity . " products" : $productQuantity . " product" ?></td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td class="float-end"><?= Yii::$app->formatter->asCurrency($totalPrice) ?></td>
                    </tr>

                </table>
                <p class="text-right mb-0">
                    <button class="btn btn-success">Continue</button>
                </p>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

