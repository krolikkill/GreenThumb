<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_admin
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $num_phone
 *
 * @property Reminder[] $reminders
 * @property UserPlant[] $userPlants
 */
class SignupForm extends \yii\db\ActiveRecord
{
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'auth_key', 'name', 'surname', 'patronymic', 'num_phone','password_repeat'], 'required'],
            [['status', 'is_admin'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'email', 'password'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 40],
            [['num_phone'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['password','string','min'=>6],
            ['password_repeat','string'],
            ['password','compare','compareAttribute'=>'password_repeat']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пароля',
            'num_phone' => 'Номер телефона',
            'email' => 'Почта',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'отчество',
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
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->num_phone = $this->num_phone;
        $user->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->auth_key = \Yii::$app->getSecurity()->generateRandomString();

        return $user->save() ? $user : null;
    }
}
