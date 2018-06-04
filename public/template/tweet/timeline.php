<?php
?>
<div class='tweet_list'>
    <img src="<?= $tweet->user->profile_image_url ?>">
    <div class='user_status'>
        <h2><?= $tweet->user->name ?></h2>
        <h3>@<?= $tweet->user->screen_name?></h3>
    </div><br>
    <div class='tweet_status'>
        <p><?= $tweet->text ?></p>
    </div>
</div>
