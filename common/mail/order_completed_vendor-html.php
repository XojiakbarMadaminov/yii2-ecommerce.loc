<?php
/**
 * @var \common\models\Order $order
 *
 */
$orderAddress = $order->orderAddress;
?>

<div class="row">
    <div class="col">
        <h5>Account information</h5>
        <table class="table table-hover">
            <tr>
                <th>Firstname</th>
                <td class="text-right"><?php echo $order->firstname ?></td>
</tr>
<tr>
    <th>Lastname</th>
    <td class="text-right"><?php echo $order->lastname ?></td>
</tr>
<tr>
    <th>Email</th>
    <td class="text-right"><?php echo $order->email ?></td>
</tr>
</table>
<h5>Address information</h5>
<table class="table">
    <tr>
        <th>Address</th>
        <td class="text-right"><?php echo $orderAddress->address ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td class="text-right"><?php echo $orderAddress->city ?></td>
    </tr>
    <tr>
        <th>State</th>
        <td class="text-right"><?php echo $orderAddress->state ?></td>
    </tr>
    <tr>
        <th>Country</th>
        <td class="text-right"><?php echo $orderAddress->country ?></td>
    </tr>
    <tr>
        <th>Zipcode</th>
        <td class="text-right"><?php echo $orderAddress->zipcode ?></td>
    </tr>
</table>
</div>
<div class="col">
    <h5>Products</h5>
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
        <?php foreach ($order->orderItems as $item): ?>
            <tr>
                <td>
                    <img src=" <?php echo $item->product->getImageUrl()?>" style="width: 50px" alt="">
                </td>
                <td><?php echo $item->product_name ?></td>
                <td><?php echo $item->quantity ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->quantity * $item->unit_price) ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <table class="table">
        <tr>
            <th>Total Items</th>
            <td><?php echo $order->getItemsQuantity() ?></td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td><?php echo Yii::$app->formatter->asCurrency($order->total_price) ?></td>
        </tr>
    </table>
</div>
</div>
