<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plant".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property string $care_guide
 * @property string|null $water_frequency
 * @property string|null $light_requirements
 * @property string|null $temperature_range
 * @property string|null $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Category $category
 * @property UserPlant[] $userPlants
 */
class Plant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'care_guide'], 'required'],
            [['category_id'], 'integer'],
            [['description', 'care_guide'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'light_requirements'], 'string', 'max' => 255],
            [['water_frequency'], 'string', 'max' => 50],
            [['temperature_range'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'description' => 'Описание',
            'care_guide' => 'Руководство',
            'water_frequency' => 'Поливать',
            'light_requirements' => 'Свет',
            'temperature_range' => 'Температура',
            'image' => 'Фото',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[UserPlants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPlants()
    {
        return $this->hasMany(UserPlant::class, ['plant_id' => 'id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/plants/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
