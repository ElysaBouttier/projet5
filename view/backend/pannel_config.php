<?php ob_start(); ?>

<div class="container">

    <?php
        require_once ('../inc/_articleOnline.php');
    ?>

    <?php
        require_once ('../inc/_draft.php');
    ?>

    <?php
        require_once ('../inc/_reportedComments.php');
    ?>

<div>
    <h3>Texte en description :</h3>
    <p></p>
    <a href="http://">Modifier</a>
</div>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>
