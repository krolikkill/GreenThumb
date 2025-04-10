<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class ForumCategory extends ActiveRecord
{
    public static function tableName()
    {
        return 'forum_category';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function getTopics()
    {
        return $this->hasMany(ForumTopic::class, ['category_id' => 'id']);
    }
}