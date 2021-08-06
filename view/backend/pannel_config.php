<?php ob_start(); ?>

<div class="container">
<h1 class="text-center">Compte administrateur</h1>
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
    <h3>Edito :</h3>
    <p></p>
    <a href="http://">Modifier</a>
</div>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('../frontend/template.php'); ?>
