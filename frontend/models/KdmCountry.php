<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_country".
 *
 * @property int $id
 * @property string $sortname
 * @property string $name
 * @property int $phonecode
 *
 * @property KdmState[] $kdmStates
 */
class KdmCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sortname', 'name', 'phonecode'], 'required'],
            [['phonecode'], 'integer'],
            [['sortname'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sortname' => 'Sortname',
            'name' => 'Name',
            'phonecode' => 'Phonecode',
        ];
    }

    /**
     * Gets query for [[KdmStates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKdmStates()
    {
        return $this->hasMany(KdmState::className(), ['country_id' => 'id']);
    }
}
