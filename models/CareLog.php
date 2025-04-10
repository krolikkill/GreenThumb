<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "care_log".
 *
 * @property int $id
 * @property int $user_plant_id
 * @property string $type
 * @property string $date
 * @property string|null $notes
 *
 * @property UserPlant $userPlant
 */
class CareLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'care_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_plant_id', 'type'], 'required'],
            [['user_plant_id'], 'integer'],
            [['type', 'notes'], 'string'],
            [['date'], 'safe'],
            [['user_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserPlant::class, 'targetAttribute' => ['user_plant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_plant_id' => 'User Plant ID',
            'type' => 'Type',
            'date' => 'Date',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[UserPlant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlant()
    {
        return $this->hasOne(UserPlant::class, ['id' => 'user_plant_id']);
    }
}
