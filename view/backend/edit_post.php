<?php ob_start(); ?>
    
<?php
    require_once('./view/inc/_addImg.php');
?>

<div class="container">

    <h1 class="text-center title-add-post">Modifier l'oeuvre</h1>
    <form class="add-post-form" action="?controller=PostController&action=publish&id=<?php echo $post->getId()?>" method="POST" enctype="multipart/form-data">
        <div class="d-flex">
            <p class="text-start add-post-title-form">Titre :</p>
            <label for="title" class="add-post-label-title">
                <input class="add-post-input-title" type="title" style="width:100%" id="title" name="title" placeholder="<?php echo $post->getTitle() ?>">
            </label>
        </div>

        <div class="d-flex add-post-img-div">
            <p class="text-start  add-post-img-title">Image de présentation : </p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature_img" name="miniature_img" accept="image/png, image/jpeg, image/jpg">
            </label>
            <img src="<?php '/public/img/'.$post->getMiniatureImg() ?>" alt="">
        </div>
        <div class="d-flex row add-post-text-div">
            <p class="text-start  add-post-text-title">Texte de présentation :</p>
            <textarea id="content" name="content" rows="5" cols="33"><?php echo $post->getContent() ?></textarea>
        </div>
        <input type="submit" class="d-flex mx-auto btn btn-primary" value="Mettre en ligne">
    </form>
    
    <!-- Button trigger modal -->
    <p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImgModal">Ajouter une image</button>
    </p>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>