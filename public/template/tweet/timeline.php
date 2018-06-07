<?php
?>
<div class='tweet_list'>
    <img src="<?= $tweet->user->profile_image_url ?>">
    <div class='user_status'>
    <div><?= $tweet->user->name ?> @<?= $tweet->user->screen_name ?> <?= $tweet->user->protected ? 'Lock' : ''?></div>
    </div>
    <div class='tweet_status'>
    <div><?= $tweet->text ?></div>
    <div><?= $tweet->created_at ?></div>
        <div class='favo_retweet'>
        </div>
    </div>
</div><br>
