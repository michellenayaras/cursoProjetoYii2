<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnderecoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Endereços';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="endereco-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('cadastrar Endereço', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            [
                'attribute'=>'rua',
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Digite a rua'
                ], 
            ],
            'cidade',
            'bairro',
            'estado',
            //'numero',
            'cep',
            //'pontoRefencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
