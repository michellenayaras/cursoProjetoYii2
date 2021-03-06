<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
           if(!Yii::$app->user->isGuest){
            echo Html::a('Cadastrar Usuário', ['create'], ['class' => 'btn btn-success']) ;

           }
            
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // 'class' => 'yii\grid\SerialColumn'],

            //'id',
          
            [
                'attribute'=>'nome',
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Digite um nome'
                ], 
            ],
            //'senha',
            'telefone',
            'email:email',
            'dataNascimento',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
