<?php

/** @var yii\web\View $this */
/** @var \app\models\Image[] $images */

$this->title = 'VIAM Test Application';
?>

<script>
function deleteImage(id){
    fetch('<?= \yii\helpers\Url::to(['api/delete']) ?>?id='+id)
        .then((response) => response.json())
        .then(function(data) {
            console.log(data)
        });
        event.target.parentNode.parentNode.remove()
}
</script>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">VIAM</h1>
    </div>

    <div class="body-content">
        <table width="100%">
            <? foreach ($images as $image) { ?>
                <tr>
                    <td><a href="<?= \app\models\Image::getUrl($image->id) ?>" target="_blank"><?= $image->id ?></a> </td>
                    <td><?= $image->is_approved ? 'approved' : 'declined'?> </td>
                    <td><input type="button" value="Delete" onclick="deleteImage(<?= $image->id ?>)"></td>
                </tr>
            <? } ?>
        </table>
    </div>
</div>
