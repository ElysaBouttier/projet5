<?php ob_start(); ?>

<div class="container">
    <h1 class="text-center">Compte administrateur</h1>
    <?php
    require_once('./view/inc/_articleOnline.php');
    ?>

    <?php
    require_once('./view/inc/_draft.php');
    ?>

    <?php
    require_once('./view/inc/_reportedComments.php');
    ?>

    <?php
    require_once('./view/inc/_addEdito.php');
    ?>


    <div class="edito-div">
        <h3>Edito :</h3>
        <div class="edito-p">
            <p>
                <?php
                echo $edito
                ?>
            </p>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary update-edito-button" data-bs-toggle="modal" data-bs-target="#updateEdito">
            Modifier
        </button>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>