<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "forum_topic".
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property int $is_pinned
 * @property int $is_closed
 * @property int $views_count
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ForumCategory $category
 * @property ForumPost[] $forumPosts
 * @property User $user
 */
class ForumTopic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forum_topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'title', 'content'], 'required'],
            [['category_id', 'user_id', 'views_count'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForumCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            ['user_id','default','value'=>Yii::$app->user->getId()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'content' => 'Content',
            'views_count' => 'Views Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

            ],
        ];
    }
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ForumCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ForumPosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForumPosts()
    {
        return $this->hasMany(ForumPost::class, ['topic_id' => 'id']);
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

    public function getPosts()
    {
        return $this->hasMany(ForumPost::class, ['topic_id' => 'id']);
    }
}
