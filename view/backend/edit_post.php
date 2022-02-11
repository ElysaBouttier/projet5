<?php ob_start(); ?>

<?php
require_once('./view/inc/_addImg.php');
require_once('./view/inc/_updateImg.php');
?>

<div class="container container-edit-post">

    <div class="title-edit-post">
        <h1 class="title-edit-post">Modifier l'oeuvre</h1>
    </div>
    <form class="add-post-form" action="?controller=PostController&action=updatePost&id=<?php echo $post->getId() ?>" method="POST" enctype="multipart/form-data">
        <div class="d-flex div-title-edit">
            <p class="text-start add-post-title-form">Titre :</p>
            <label for="title" class="add-post-label-title">
                <input class="add-post-input-title" type="title" style="width:100%" id="title" name="title" value="<?php echo $post->getTitle() ?>">
            </label>
        </div>

        <div class="edit-img-text">
            <div class="img-miniature-edit col-4">
                <p class="text-start  add-post-img-title">Image de présentation :</p>
                <a href="" data-bs-toggle="modal" data-bs-target="#updateImg">
                    <img src="../../public/img/<?php echo $post->getMiniatureImg()  ?>" class="img-fluid img-get-miniature-edit" alt="...">
                    <p>Modifier</p>
                </a>
            </div>


            <div class="edit-post-text-div col-6">
                <p class="text-start  add-post-text-title">Texte de présentation :</p>
                <textarea id="content_edit_post" name="content" rows="5" cols="33"><?php echo $post->getContent() ?></textarea>
            </div>
        </div>

        <div class="online">
            <div class="form-check">
                <?php
                if ($post->getStatus() == 0) {
                ?>
                    <input class="form-check-input" type="radio" name="status" id="draft" value="draft" checked>
                <?php
                } else {
                ?>
                    <input class="form-check-input" type="radio" name="status" id="draft" value="draft">
                <?php
                }
                ?>

                <label class="form-check-label" for="draft">
                    Brouillon
                </label>
            </div>

            <div class="form-check">
                <?php
                if ($post->getStatus() == 1) {
                ?>
                    <input class="form-check-input" type="radio" name="status" id="online" value="online" checked>
                <?php
                } else {
                ?>
                    <input class="form-check-input" type="radio" name="status" id="online" value="online">
                <?php
                }
                ?>

                <label class="form-check-label" for="online">
                    En ligne
                </label>
            </div>
        </div>

        <input type="submit" class="d-flex mx-auto btn btn-primary edit-post-submit" name="onlineAction" value="Valider">
    </form>

    <!-- Button trigger modal -->
    <h3 class="addPostImgTitle">Ajouter des images et descriptions à l'oeuvre</h3>
    <button data-bs-toggle="modal" class="addPostImg" data-bs-target="#addImgModal"> 
        <img class="addPostImgLogo" src="../../public/img/add-image.png">
    </button>
    <div class="edit-post-img-and-description">
        <?php
        require_once('./view/inc/_imgAndDescription.php');
        ?>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>