<?php
  $user_data = wp_get_current_user();
?>

<li class="personal-data">
  <a href="<?= site_url(); ?>/dashboard/personal-data/"><span class="icon icon-user"></span><span class="link">
      <?= !empty($user_data->first_name) ? $user_data->first_name : '...' ?> <?= !empty($user_data->last_name) ? $user_data->last_name : '...' ?></span><br>
    <span class="email"><?= !empty($user_data->user_email) ? $user_data->user_email : '...' ?></span></a></li>
<li class="favorites">
  <a href="<?= site_url(); ?>/dashboard/favorites/"><span class="icon icon-favorites"></span><span class="link">Favorites</span></a></li>
<li class="purchase">
  <a href="<?= site_url(); ?>/dashboard/purchase-history/"><span class="icon icon-purchase"></span><span class="link">Purchase History</span></a></li>
<li class="message">
  <a href="<?= site_url(); ?>/dashboard/message-history/" aria-current="page"><span class="message-count hide">0</span><span class="icon icon-message"></span><span class="link">Message History</span></a></li>
<li class="logout">
  <a href="<?= site_url(); ?>/wp-login.php?action=logout"><span class="icon icon-logout"></span><span class="link">Log Out</span></a></li>
