<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ApiController extends Controller
{
    /**
     * Displays homepage.
     *
     */
    public function actionImage()
    {
        return [
            'id' => 1020,
            'url' => 'https://picsum.photos/id/1020/600/500'
        ];
        return $this->render('index');
    }

}
