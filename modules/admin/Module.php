<?php

namespace app\modules\admin;

use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->is_admin) {
            throw new \yii\web\ForbiddenHttpException('Доступ запрещен.');
        }

        return true;
    }
    public $layout = 'main'; // Использует layouts/main.php из папки модуля\
}
