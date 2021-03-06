<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>
	<div class="row">
		<div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'user_name')?>
                <?= $form->field($model, 'password')->passwordInput()?>
                <?= $form->field($model, 'name')?> 
                <?= $form->field($model, 'email')?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
	</div>
</div>
