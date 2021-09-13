<?php ob_start(); ?>
<?php
    //require('./view/inc/_addImg.php');
    ?>

<div class="container">

    <h1 class="text-center title-add-post">Modifier l'oeuvre</h1>
    <form class="add-post-form" action="?controller=PostController&action=addPost&id=<?= $post['blogpost_id'] ?>" method="POST">
        <div class="d-flex">
            <p class="text-start add-post-title-form">Titre :</p>
            <label for="title" class="add-post-label-title">
                <input class="add-post-input-title" type="title" style="width:100%" id="title" name="title" placeholder="Titre">
            </label>
        </div>

        <div class="d-flex add-post-img-div">
            <p class="text-start  add-post-img-title">Image de présentation : </p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature_img" name="miniature_img" accept="image/png, image/jpeg">
            </label>
        </div>
        <div class="d-flex row add-post-text-div">
            <p class="text-start  add-post-text-title">Texte de présentation :</p>
            <textarea id="content" name="content" rows="5" cols="33"></textarea>
        </div>
        <input type="submit" class="d-flex mx-auto btn btn-primary" value="Modifier l'oeuvre">
    </form>

    <!-- Button trigger modal -->
    <p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImgModal">Ajouter une image</button>
    </p>

    <!-- Tant qu'il y a une image, afficher image + text description -->
    
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>