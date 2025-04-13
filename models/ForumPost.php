<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "forum_post".
 *
 * @property int $id
 * @property int $topic_id
 * @property int $user_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ForumTopic $topic
 * @property User $user
 */
class ForumPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forum_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [ 'content', 'required'],
            [['topic_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['topic_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForumTopic::class, 'targetAttribute' => ['topic_id' => 'id']],
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
            'topic_id' => 'Topic ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // в модели ForumPost


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
     * Gets query for [[Topic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(ForumTopic::class, ['id' => 'topic_id']);
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


}
