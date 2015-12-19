<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $muni_codigo
 * @property string $muni_nome
 * @property integer $esta_codigo
 *
 * @property Aluno[] $alunos
 * @property Estado $estaCodigo
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['muni_nome', 'esta_codigo'], 'required'],
            [['esta_codigo'], 'integer'],
            [['muni_nome'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'muni_codigo' => 'Muni Codigo',
            'muni_nome' => 'Muni Nome',
            'esta_codigo' => 'Esta Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['muni_codigo' => 'muni_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstaCodigo()
    {
        return $this->hasOne(Estado::className(), ['esta_codigo' => 'esta_codigo']);
    }
}
