<?php ob_start(); ?>

<div class="container">

</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('../frontend/template.php'); ?>
