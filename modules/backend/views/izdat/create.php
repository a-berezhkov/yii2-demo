<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\common\models\Izdat */

$this->title = 'Create Izdat';
$this->params['breadcrumbs'][] = ['label' => 'Izdats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izdat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
