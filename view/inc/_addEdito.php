<!-- Modal -->
<div class="modal fade" id="updateEdito" tabindex="-1" aria-labelledby="editoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editoModal">Mise à jour de l'édito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="?controller=UserController&action=editEdito" method="post">
          <textarea id="content" name="content" cols="30" rows="5" class="mceEditor"><?php echo $edito ?></textarea><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>