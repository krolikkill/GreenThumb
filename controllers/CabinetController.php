<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;
use app\models\UserPlant;
use app\models\PlantCareLog;
use yii\data\ActiveDataProvider;

class CabinetController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserPlant::find()->where(['user_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddPlant()
    {
        $model = new UserPlant();
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->uploadImage();
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Растение добавлено в вашу коллекцию');
                return $this->redirect(['index']);
            }
        }

        return $this->render('add-plant', [
            'model' => $model,
        ]);
    }

    public function actionViewPlant($id)
    {
        $model = UserPlant::find()
            ->where(['id' => $id, 'user_id' => Yii::$app->user->id])
            ->one();

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Растение не найдено');
        }

        $careLogDataProvider = new ActiveDataProvider([
            'query' => $model->getCareLogs(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('view-plant', [
            'model' => $model,
            'careLogDataProvider' => $careLogDataProvider,
        ]);
    }

    // Остальные методы остаются без изменений
    // ...

    public function actionAddCareLog($plant_id)
    {
        $userPlant = UserPlant::findOne(['id' => $plant_id, 'user_id' => Yii::$app->user->id]);
        if (!$userPlant) {
            throw new \yii\web\NotFoundHttpException('Растение не найдено');
        }

        $model = new PlantCareLog();
        $model->user_plant_id = $plant_id;
        $model->date = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Обновляем даты последнего ухода
            if ($model->care_type === 'watering') {
                $userPlant->last_watered = $model->date;
            } elseif ($model->care_type === 'fertilizing') {
                $userPlant->last_fertilized = $model->date;
            }

            if ($model->save() && $userPlant->save(false)) {
                Yii::$app->session->setFlash('success', 'Запись успешно добавлена в журнал ухода');
                return $this->redirect(['view-plant', 'id' => $plant_id]);
            }
        }

        return $this->render('add-care-log', [
            'model' => $model,
            'userPlant' => $userPlant,
        ]);
    }

    public function actionUpdateCareLog($id)
    {
        $model = PlantCareLog::find()
            ->joinWith('userPlant')
            ->where(['plant_care_log.id' => $id, 'user_plant.user_id' => Yii::$app->user->id])
            ->one();

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Запись не найдена');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно обновлена');
            return $this->redirect(['view-plant', 'id' => $model->user_plant_id]);
        }

        return $this->render('update-care-log', [
            'model' => $model,
        ]);
    }

    public function actionDeleteCareLog($id)
    {
        $model = PlantCareLog::find()
            ->joinWith('userPlant')
            ->where(['plant_care_log.id' => $id, 'user_plant.user_id' => Yii::$app->user->id])
            ->one();

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Запись не найдена');
        }

        $plant_id = $model->user_plant_id;
        $model->delete();

        Yii::$app->session->setFlash('success', 'Запись успешно удалена');
        return $this->redirect(['view-plant', 'id' => $plant_id]);
    }

}