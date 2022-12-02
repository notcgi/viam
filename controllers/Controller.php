<?php

namespace app\controllers;

use Yii;
use yii\web\Controller as BaseController;
use yii\web\ForbiddenHttpException;

class Controller extends BaseController
{
    /**
     * @throws ForbiddenHttpException
     * @todo would be better set in behaviors
     */
    public function checkAdminAccess()
    {
        if (!Yii::$app->request->get(Yii::$app->params['adminToken']))
            throw new ForbiddenHttpException();
    }
}
