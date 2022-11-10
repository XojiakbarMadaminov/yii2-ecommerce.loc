<?php
/**
 * @var array $items
 * @var float $totalPrice
 */
?>

<div class="card">
    <div class="card-header">
        <h3 class="text-center">Your cart items</h3>
    </div>
    <div class="card-body p-0">
        <?php if (!empty($items)): ?>
        <table class="table table-hover">
            <theaad>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Unit price</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Action</th>
                </tr>
            </theaad>
            <tbody>
            <?php $inc = 1;?>
            <?php foreach ($items as $item): ?>
                <tr data-id="<?php echo $item['id']?>" data-url="<?php echo \yii\helpers\Url::to(['/cart/change-quantity'])?>">
                    <td><?=$inc++?></td>
                    <td><?php echo $item['name']?></td>
                    <td>
                        <img src="<?php echo \common\models\Product::formatImageUrl($item['image'])?>" alt="<?php echo $item['name']?>"
                             style="width: 50px">
                    </td>
                    <td><?php echo Yii::$app->formatter->asCurrency($item['price']) ?></td>
                    <td>
                        <input type="number" min="1" class="form-control item-quantity" style="width: 60px" value="<?=$item['quantity']?>">
                    </td>
                    <td><?php echo Yii::$app->formatter->asCurrency($item['total_price'])?></td>
                    <td>
                        <?php echo \yii\helpers\Html::a('Delete', ['/cart/delete', 'id' => $item['id']], [
                            'class' => 'btn btn-outline-danger btn-sm',
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to remove this product from cart?'
                        ])?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>


            <a href="<?php echo \yii\helpers\Url::to(['/cart/checkout'])?>" class="btn btn-primary me-0">Chekout</a>
        <?php else: ?>
        <p class="text-muted text-center p-5">There are no items in the cart yet</p>
        <?php endif;?>
    </div>
</div>