<?php
namespace app\controllers;

use app\models\Plant;
use app\models\Category;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class PlantController extends Controller
{
    public function actionIndex()
    {
        $categoryId = \Yii::$app->request->get('category_id');

        $query = Plant::find()->with('category');

        if ($categoryId) {
            $query->where(['category_id' => $categoryId]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC,
                ]
            ]
        ]);

        $categories = Category::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'selectedCategory' => $categoryId
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Plant::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенное растение не найдено.');
    }

}