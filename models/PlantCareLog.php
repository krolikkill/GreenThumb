<?php
namespace app\models;

use yii\db\ActiveRecord;

class PlantCareLog extends ActiveRecord
{
    public static function tableName()
    {
        return 'plant_care_log';
    }

    public function rules()
    {
        return [
            [['user_plant_id', 'care_type', 'date'], 'required'],
            [['user_plant_id'], 'integer'],
            [['notes'], 'string'],
            [['date', 'created_at'], 'safe'],
            [['care_type'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'care_type' => 'Тип ухода',
            'date' => 'Дата',
            'notes' => 'Заметки',
        ];
    }

    public function getUserPlant()
    {
        return $this->hasOne(UserPlant::class, ['id' => 'user_plant_id']);
    }
}