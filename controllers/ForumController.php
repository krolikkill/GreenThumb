<?php
namespace app\controllers;

use app\models\ForumCategory;
use app\models\ForumTopic;
use app\models\ForumPost;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ForumController extends Controller
{

    public function actionIndex()
    {
        $categories = ForumCategory::find()->all();
        return $this->render('index', ['categories' => $categories]);
    }

    public function actionCategory($id)
    {
        $category = ForumCategory::findOne($id);
        $topics = ForumTopic::find()->where(['category_id' => $id])->all();

        return $this->render('category', [
            'category' => $category,
            'topics' => $topics,
        ]);
    }

    public function actionTopic($id)
    {
        $model = new ForumPost();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Комментарий успешно добавлен!');
                return $this->redirect(['topic', 'id' => $model->topic_id]);
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при сохранении комментария');
            }
        }
        $topic = ForumTopic::findOne($id);
        $posts = ForumPost::find()->where(['topic_id' => $id])->all();

        return $this->render('topic', [
            'topic' => $topic,
            'posts' => $posts,
            'model'=>$model
        ]);
    }


    public function actionCreateTopic($category_id)
    {
        $model = new ForumTopic();
        $model->category_id = $category_id;

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['topic', 'id' => $model->id]);
        }

        return $this->render('create-topic', ['model' => $model]);
    }


    public function actionAddPost($topic_id)
    {
        $model = new ForumPost();
        $model->topic_id = $topic_id;
        $model->user_id = \Yii::$app->user->id;

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['topic', 'id' => $topic_id]);
        }

        return $this->render('add-post', ['model' => $model]);
    }

    public function actionValidatePost()
    {
        $model = new ForumPost();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionCreatePost()
    {
        $model = new ForumPost();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Комментарий успешно добавлен!');
                return $this->redirect(['topic', 'id' => $model->topic_id]);
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при сохранении комментария');
            }
        }

        return $this->redirect(Yii::$app->request->referrer ?: ['forum/index']);
    }
}