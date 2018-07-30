<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <h3>View Post</h3>
    <h5>Title      :  <?php echo $post->title; ?> </h5>
    <p>Description :  <?php echo $post->description; ?>  </p>
    <p>Date  :  <?php echo $post->date_created; ?>  </p>
</div>