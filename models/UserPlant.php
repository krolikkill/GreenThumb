<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UserPlant extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_plant';
    }

    public function rules()
    {
        return [
            [['user_id', 'name'], 'required'],
            [['user_id'], 'integer'],
            [['description', 'notes'], 'string'],
            [['last_watered', 'last_fertilized', 'created_at', 'updated_at'], 'safe'],
            [['name', 'water_frequency', 'light_requirements', 'temperature_range'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 2],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название растения',
            'description' => 'Описание',
            'water_frequency' => 'Частота полива',
            'light_requirements' => 'Требования к освещению',
            'temperature_range' => 'Диапазон температур',
            'image' => 'Изображение',
            'notes' => 'Заметки',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getCareLogs()
    {
        return $this->hasMany(PlantCareLog::class, ['user_plant_id' => 'id'])
            ->orderBy(['date' => SORT_DESC]);
    }

    public function uploadImage()
    {
        $image = UploadedFile::getInstance($this, 'image');
        if ($image) {
            $fileName = uniqid() . '.' . $image->extension;
            $image->saveAs('uploads/user-plants/' . $fileName);
            $this->image = $fileName;
            return true;
        }
        return false;
    }
}