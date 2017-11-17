<?php
/**
 * @var $page \app\models\Pages
 * @var $this View
 * @var $categorySlug string
 **/

use yii\web\View;

?>

<a href="<?= \yii\helpers\Url::to(['category', 'slug' => $categorySlug]) ?>">Back</a>
<h1><?= $page->name ?></h1>
<p><?= $page->text ?></p>