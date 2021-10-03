<?php
    foreach ($allImages as $image)
    {
?>
    <div class="row align-items-start">
        <div class="col-3">
            <img src="../../public/img/<?php echo $image->getUrl()  ?>" class="img-fluid" alt="...">
        </div>
        <div class="col">
            <p>
                <?php
                echo $image->getContent();
                ?>
            </p>
        </div>
        <div class="col-3 ">
            <a href="?controller=ImageController&action=deleteImage&id=<?php echo $image->getId() ?>&post_id=<?php echo $image->getPostId() ?>"
                   title="Supprimer l'image"
                   onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce billet ?'))">
                    Supprimer
                </a>
        </div>
    </div>
<?php
    }
?>