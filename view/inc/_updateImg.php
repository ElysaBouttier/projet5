<!-- Modal -->
<div class="modal fade" id="updateImg" tabindex="-1" aria-labelledby="updateImgModalLabel" aria-hidden="true">
    <div class="modal-dialog login-container">
        <div class="modal-content">
            <div class="modal-header">
                <p>Modification de l'image</p>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div class="col-6 login-modal-div">

                    <!-- Login form -->
                    <form class="update-img-form" action="?controller=PostController&action=updateImgPost&id=<?php echo $post->getId() ?>" method="POST" enctype="multipart/form-data">
                        <label for="img" class="col-12 label-login-form">
                            <div class="d-flex justify-content-center">
                                <input class="input-add-post" type="file" id="miniature_img" name="miniature_img" value="<?php echo $post->getMiniatureImg() ?>" accept="image/png, image/jpeg, image/jpg">
                            </div>
                        </label>
                        <input type="submit" class="d-flex justify-content-center mx-auto" value="Valider">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>