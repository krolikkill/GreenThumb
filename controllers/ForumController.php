<?php
namespace app\controllers;

use Yii;
use app\models\ForumCategory;
use app\models\ForumTopic;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class ForumController extends Controller
{
    public function actionIndex()
    {
        $categories = ForumCategory::find()
            ->with(['topics' => function($query) {
                $query->orderBy(['is_pinned' => SORT_DESC, 'updated_at' => SORT_DESC]);
            }])
            ->all();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function actionCategory($id)
    {
        $category = ForumCategory::findOne($id);
        if (!$category) {
            throw new \yii\web\NotFoundHttpException('Категория не найдена.');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => ForumTopic::find()
                ->where(['category_id' => $id])
                ->orderBy(['is_pinned' => SORT_DESC, 'updated_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('category', [
            'category' => $category,
            'dataProvider' => $dataProvider
        ]);
    }
}