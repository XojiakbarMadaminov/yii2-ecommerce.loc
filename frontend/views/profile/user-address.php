<?php
/**
 * @var \common\models\UserAddress $userAddress
 * @var \yii\web\View $this
 *
 */

use yii\widgets\ActiveForm;

?>

<?php if (isset($success) && $success): ?>
    <div class="alert alert-success">
        Your address was successfully updated!
    </div>
<?php endif; ?>
<?php $addressForm = ActiveForm::begin([
    'action' => ['/profile/user-address'],
    'options' => [
        'data-pjax' => 1
    ]
]); ?>
<?= $addressForm->field($userAddress, 'address') ?>
<?= $addressForm->field($userAddress, 'city') ?>
<?= $addressForm->field($userAddress, 'state') ?>
<?= $addressForm->field($userAddress, 'country') ?>
<?= $addressForm->field($userAddress, 'zipcode') ?><br>
<button class="btn btn-primary" type="submit">Update</button>
<?php ActiveForm::end() ?>
