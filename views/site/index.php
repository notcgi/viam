<?php

/** @var yii\web\View $this */

$this->title = 'VIAM Test Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">VIAM</h1>
    </div>

    <div class="body-content">
        <div>
        <img src="" id="main_img">
        </div>
        <input type="button" value="Approve" onclick="estimate_photo(true)">
        <input type="button" value="Decline" onclick="estimate_photo(false)">
    </div>
</div>

<script>
function update_photo(){
    fetch('<?= \yii\helpers\Url::to(['api/image']) ?>')
        .then((response) => response.json())
        .then(function(data) {
            imgNode = document.getElementById('main_img')
            imgNode.setAttribute('src', data.url)
            imgNode.setAttribute('data-id', data.id)
            imgNode.onerror = (a => estimate_photo(false))
            });
}
function estimate_photo(is_approved){
    imgId = document.getElementById('main_img').dataset.id
    fetch('<?= \yii\helpers\Url::to(['api/estimate']) ?>?id='+imgId+'&is_approved='+is_approved)
        .then((response) => response.json())
        .then((data) => console.log(data));
    update_photo()
}
update_photo()
</script>
