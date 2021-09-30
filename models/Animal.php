<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $sexo
 * @property string|null $cor
 * @property string|null $raca
 * @property string|null $porte
 * @property string|null $idade
 * @property string|null $foto
 * @property int|null $usuario_id
 * @property int|null $endereco_id
 *
 * @property Endereco $endereco
 * @property Usuario $usuario
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'endereco_id'], 'integer'],
            [['nome', 'sexo', 'cor', 'raca', 'porte', 'idade', 'foto'], 'string', 'max' => 255],
            [['endereco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Endereco::className(), 'targetAttribute' => ['endereco_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'cor' => 'Cor',
            'raca' => 'Raca',
            'porte' => 'Porte',
            'idade' => 'Idade',
            'foto' => 'Foto',
            'usuario_id' => 'Usuario ID',
            'endereco_id' => 'Endereco ID',
        ];
    }

    /**
     * Gets query for [[Endereco]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEndereco()
    {
        return $this->hasOne(Endereco::className(), ['id' => 'endereco_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}