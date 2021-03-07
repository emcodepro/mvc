<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 05-Mar-21
 * Time: 10:36
 */

use emcodepro\mvc\form\Form;

/** @var $model \app\models\User */
$this->title = 'Register';
?>
<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'username') ?>
<?php echo $form->field($model, 'email')->emailInput() ?>
<?php echo $form->field($model, 'password')->passwordInput() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordInput() ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
