<?php
namespace app\controllers;

use app\models\ForumCategory;
use Yii;
use app\models\ForumTopic;
use app\models\ForumPost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ForumTopicController extends Controller
{
    public function actionView($id)
    {
        $topic = ForumTopic::findOne($id);
        if (!$topic) {
            throw new NotFoundHttpException('Тема не найдена.');
        }

        // Увеличиваем счетчик просмотров
        $topic->updateCounters(['views_count' => 1]);

        $newPost = new ForumPost();

        if ($newPost->load(Yii::$app->request->post())) {
            $newPost->topic_id = $topic->id;
            if ($newPost->save()) {
                Yii::$app->session->setFlash('success', 'Сообщение добавлено');
                return $this->refresh();
            }

        }

        $posts = ForumPost::find()
            ->where(['topic_id' => $id])
            ->with('user')
            ->orderBy(['created_at' => SORT_ASC])
            ->all();

        return $this->render('view', [
            'topic' => $topic,
            'posts' => $posts,
            'newPost' => $newPost
        ]);
    }


}