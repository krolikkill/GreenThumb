<h1>Панель администратора GreenThumb</h1>

<div class="admin-dashboard">
    <div class="card">
        <h2>Растения</h2>
        <a href="<?= \yii\helpers\Url::to(['/admin/plant/index']) ?>" class="btn btn-primary">Управление</a>
    </div>
    <div class="card">
        <h2>Категории</h2>
        <a href="<?= \yii\helpers\Url::to(['/admin/category/index']) ?>" class="btn btn-primary">Управление</a>
    </div>


</div>

<style>
    .admin-dashboard {
        display: flex;
        gap: 20px;
        margin-top: 30px;
    }
    .card {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        flex: 1;
    }
</style>