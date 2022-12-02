<?php

namespace app\controllers;

use app\models\Image;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdmin()
    {
        $this->checkAdminAccess();
        $images = Image::find()->all();
        return $this->render('admin', compact('images'));
    }

}
