<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property bool $is_approved
 */
class Image extends ActiveRecord
{
    public function rules()
    {
        return [
            ['id', 'integer', 'min' => Yii::$app->params['picsum']['min_id'], 'max' => Yii::$app->params['picsum']['max_id']],
            ['is_approved', 'boolean'],
        ];
    }

    public static function getExistingIds(): array
    {
        $images = Image::find()->all();
        return array_map(fn(Image $image) => $image->id, $images);
    }

    public static function getUrl(int $id)
    {
        $width = Yii::$app->params['picsum']['width'];
        $height = Yii::$app->params['picsum']['height'];
        return "https://picsum.photos/id/$id/$width/$height";
    }

    public static function createImage(int $id, bool $is_approved)
    {
        $image = new Image([
            'id' => $id,
            'is_approved' => $is_approved
        ]);
        return $image->save();
    }
}
