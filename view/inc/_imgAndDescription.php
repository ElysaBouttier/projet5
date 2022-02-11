<?php
foreach ($allImages as $image) {
?>
    <div class="img-and-description-div">
        <div class="img-and-description-div-img">
            <img src="../../public/img/<?php echo $image->getUrl()  ?>" class="img-fluid" alt="...">
        </div>
        <div class="img-and-description-div-p">
            <p>
                <?php
                echo $image->getContent();
                ?>
            </p>
        </div>
        <div class="img-and-description-div-delete">
            <a href="?controller=ImageController&action=deleteImage&id=<?php echo $image->getId() ?>&post_id=<?php echo $image->getPostId() ?>" title="Supprimer l'image" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce billet ?'))">
                <button type="button" class="btn btn-outline-danger">Supprimer</button>
            </a>
        </div>
    </div>
<?php
}
?>