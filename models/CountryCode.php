<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "country_code".
 *
 * @property int $id
 * @property int $c_id
 * @property string $code
 *
 * @property CountryName $c
 */
class CountryCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_id', 'code'], 'required'],
            [['c_id'], 'integer'],
            [['code'], 'string', 'max' => 11],
            [['c_id'], 'exist', 'skipOnError' => true, 'targetClass' => CountryName::className(), 'targetAttribute' => ['c_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_id' => 'C ID',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[C]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(CountryName::className(), ['id' => 'c_id']);
    }
}
