<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Espace de connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div class="col-6">

            <!-- Login form -->
            <form action="?controller=UserController&action=loginAction" method="POST">
                <label for="pseudo" class="col-12 label-login-form">
                    <p class="text-center">Pseudo :</p>
                    <div class="d-flex justify-content-center">
                        <input type="pseudo"  name="pseudo" placeholder="pseudo">
                    </div> 
                </label>
                
                <label for="password" class="col-12 label-login-form">
                    <p class="text-center">Mot de Passe :</p> 
                    <div class="d-flex justify-content-center">
                        <input type="password" id="password" name="password" placeholder="password">
                    </div> 
                </label>
                <input type="submit" class="d-flex justify-content-center mx-auto" value="Se Connecter">
            </form>
        </div>

        <div class="d-flex col-4 not-registrer">
            <button type="button" class="btn btn-link h-25 button-login" data-bs-toggle="collapse" data-bs-target="#registrerContent" aria-controls="registrerContent" aria-expanded="false" aria-label="Toggle navigation">
            Pas encore inscrit ?</button>
        </div>
      </div>
    </div>
  </div>
</div>