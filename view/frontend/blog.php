<?php ob_start(); ?>

<div class="container">

    <?php
    require_once ('../inc/_article.php');
    ?>


    <?php
    require_once ('../inc/_addComment.php');
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>
