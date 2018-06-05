<?php
?>
<div class='profile'>
    <img src="<?= $user->profile_image_url ?>">
    <div class='user_status'>
        <div><a><?= $user->name ?> @<?= $user->screen_name ?><a></div>
        <div><?= $user->description ?></div>
        <div>tweets: <?= $user->statuses_count ?></div>
        <div>follows: <?= $user->friends_count ?></div>
        <div>follower: <?= $user->followers_count ?></div>
        <div>liked: <?= $user->favourites_count ?></div>
    </div>
</div>
<br>
