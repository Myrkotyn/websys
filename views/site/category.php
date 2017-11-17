<?php

use app\models\Pages;
use yii\base\View;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $pagesSearchModel \app\models\PagesSearch
 * @var $pagesDataProvider ActiveDataProvider
 * @var $this View
 * @var $category \app\models\Categories
 */

?>
<div class="container">
    <div class="row">`
        <?= GridView::widget([
            'dataProvider' => $pagesDataProvider,
            'columns' => [
                'name',
                'text',
                [
                    'format' => 'raw',
                    'value' => function (Pages $model) use ($category) {
                        return Html::a($model->name, Url::to(['view', 'slug' => $model->slug, 'categorySlug' => $category->slug]));
                    }
                ]
            ]
        ]) ?>
    </div>
</div>