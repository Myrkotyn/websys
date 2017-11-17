<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Pages;
use app\models\PagesSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /**
         * Register SEO-tags
         */
        Yii::$app->view->title = 'Главная';
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'один, два, три, шесть'
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'статическое описание сео'
        ]);

        return $this->render('index');
    }

    /**
     * View for category by url www.example.com/category-name
     *
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCategory($slug)
    {
        $category = Categories::find()->where(['like BINARY', 'slug', "$slug"])->one();

        if (!$category || $category->type === 2) {
            throw new NotFoundHttpException('Page not found!');
        }

        $pagesSearchModel = new PagesSearch();
        $pagesDataProvider = $pagesSearchModel->search(ArrayHelper::merge(
            Yii::$app->request->queryParams,
            [
                $pagesSearchModel->formName() => [
                    'category_id' => $category->id
                ]
            ]
        ));


        /**
         * Register SEO-tags
         */
        Yii::$app->view->title = $category->seo_title;
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $category->seo_keywords
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $category->seo_description
        ]);

        return $this->render('category', [
            'pagesDataProvider' => $pagesDataProvider,
            'category' => $category
        ]);
    }

    /**
     * View of page by url www.example.com/category-name/page-name
     *
     * @param $categorySlug
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($categorySlug, $slug)
    {
        $category = Categories::find()->where(['like BINARY', 'slug', "$categorySlug"])->one();

        if (!$category) {
            throw new NotFoundHttpException('Page not found!');
        }

        $page = Pages::find()->where([
            'category_id' => $category->id,
            'slug' => $slug
        ])->one();

        if (!$page) {
            throw new NotFoundHttpException('Page not found!');
        }

        /**
         * Register SEO-tags
         */
        Yii::$app->view->title = $page->seo_title;
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $page->seo_keywords
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $page->seo_description
        ]);

        return $this->render('view', [
            'page' => $page,
            'categorySlug' => $category->slug
        ]);
    }
}
