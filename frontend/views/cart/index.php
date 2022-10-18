<?php
/**
 * @var array $items
 */
?>

<div class="card">
    <div class="card-header">
        <h3>Your cart items</h3>
    </div>
    <div class="card-body p-0">
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
                <tr>
                    <td><?=$inc++?></td>
                    <td><?php echo $item['name']?></td>
                    <td>
                        <img src="<?php echo \common\models\Product::formatImageUrl($item['image'])?>" alt="<?php echo $item['name']?>"
                             style="width: 50px">
                    </td>
                    <td><?php echo $item['price']?></td>
                    <td><?php echo $item['quantity']?></td>
                    <td><?php echo $item['total_price']?></td>
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
    </div>
</div>