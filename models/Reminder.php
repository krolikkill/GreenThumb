<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reminder".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $user_plant_id
 * @property string $type
 * @property int|null $frequency_days
 * @property string $next_date
 * @property int $is_active
 *
 * @property User $user
 * @property UserPlant $userPlant
 */
class Reminder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reminder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'next_date'], 'required'],
            [['user_id', 'user_plant_id', 'frequency_days', 'is_active'], 'integer'],
            [['type'], 'string'],
            [['next_date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'user_plant_id' => 'User Plant ID',
            'type' => 'Type',
            'frequency_days' => 'Frequency Days',
            'next_date' => 'Next Date',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
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
