<!-- Modal -->
<div class="modal fade" id="addImgModal" tabindex="-1" aria-labelledby="newImgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newImgModal">Ajouter une image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="add-img-form" action="?controller=ImageController&action=addImage&id=<?php echo $post->getId()?>" method="POST">
            <div class="d-flex add-post-img-div">
                <p class="text-start  add-post-img-title">Image  : </p>
                <label for="url_img" class="text-end">
                    <input class="input-add-img" type="file" id="url_img" name="url_img" accept="image/png, image/jpeg">
                </label>
            </div>
            <div class="d-flex row add-img-text-div">
                <p class="text-start  add-img-text-title">Texte de présentation :</p>
                <textarea id="content" name="content" rows="5" cols="33"></textarea>
            </div>
            <div class="modal-footer">
                <input type="submit" class="d-flex mx-auto btn btn-primary" value="Ajouter l'image">
              </div>
        </form>
    </div>
    </div>
  </div>
</div>