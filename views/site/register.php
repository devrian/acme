<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Sign Up');

?>

    <h1><?= Html::encode($this->title) ?></h1>

<p><?= Yii::t('app', 'Form Register')?></p>

<?php $register_form = ActiveForm::begin([
    'id' => 'register-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

    <?= $register_form->errorSummary($new_user) ?>
    <?= $register_form->field($new_user, 'username')->textInput(['autofocus' => true]) ?>
    <?= $register_form->field($new_user, 'email')->textInput() ?>
    <?= $register_form->field($new_user, 'password')->passwordInput(['value' => '']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', 'Sign Up'), ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
