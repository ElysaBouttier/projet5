<?php ob_start(); ?>
<?php
    //require('./view/inc/_addImg.php');
    ?>

<div class="container">

    <h1 class="text-center title-add-post">Créer un post</h1>
    <form class="add-post-form" action="?controller=PostController&action=addPost" method="POST" enctype="multipart/form-data">
        <div class="d-flex">
            <p class="text-start add-post-title-form">Titre :</p>
            <label for="title" class="add-post-label-title">
                <input class="add-post-input-title" type="title" style="width:100%" id="title" name="title" placeholder="Titre">
            </label>
        </div>

        <div class="d-flex add-post-img-div">
            <p class="text-start  add-post-img-title">Image de présentation : </p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature_img" name="miniature_img" accept="image/png, image/jpeg, image/jpg">
            </label>
        </div>
        <div class="d-flex row add-post-text-div">
            <p class="text-start  add-post-text-title">Texte de présentation :</p>
            <textarea id="content" name="content" rows="5" cols="33"></textarea>
        </div>
        <input type="submit" class="d-flex mx-auto btn btn-primary" value="Mettre en brouillon">
    </form>
    
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>