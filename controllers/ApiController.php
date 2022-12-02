<?php

namespace app\controllers;

use app\models\Image;
use Codeception\Util\HttpCode;
use Yii;
use yii\web\Response;

class ApiController extends Controller
{
    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
    /**
     * Displays homepage.
     *
     */
    public function actionImage(): array
    {
        $declined_ids = Image::getExistingIds();

        // do available images exist?
        if (count($declined_ids) >= Yii::$app->params['picsum']['max_id'] - Yii::$app->params['picsum']['min_id'] + 1){
            Yii::$app->response->setStatusCode(HttpCode::NO_CONTENT);
            return [
                'message' => 'There are no available images',
                'id' => '',
                'url' => ''
            ];
        }

        // random img id that is not declined
        do $imgId = rand(Yii::$app->params['picsum']['min_id'],Yii::$app->params['picsum']['max_id']);
        while (in_array($imgId, $declined_ids));

        return [
            'id' => $imgId,
            'url' => Image::getUrl($imgId)
        ];
    }

    public function actionEstimate(int $id, bool $is_approved): array
    {
        $existingImage = Image::findOne($id);
        if (!$existingImage and Image::createImage($id,$is_approved))
            return ['success'=> true];

        Yii::$app->response->setStatusCode(HttpCode::UNPROCESSABLE_ENTITY);
        return [
            'message' => 'Incorrect data',
            'success' => false,
        ];
    }

    public function actionDelete(int $id): array
    {
        $this->checkAdminAccess();
        $image = Image::findOne($id);
        if (!$image) {
            Yii::$app->response->setStatusCode(HttpCode::UNPROCESSABLE_ENTITY);
            return [
                'message' => "Image doesn't exist",
                'success' => false,
            ];
        }

        $image->delete();
        return ['success'=> true];
    }

}
