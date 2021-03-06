<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog login-container">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Espace de connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div class="col-6 login-modal-div">

          <!-- Login form -->
          <form action="?controller=UserController&action=loginAction" method="POST">

            <div>
              <label for="usernameLogin" class="col-12 text-center label-login-form">Pseudo
              </label>
              <div class="d-flex justify-content-center">
                <input type="text" class="form-control" id="usernameLogin" name="username" placeholder="Pseudo">
              </div>
            </div>

            <div class="div-login-form">
              <label for="password" class="col-12 text-center label-login-form"> Mot de Passe :
              </label>
              <div class="d-flex justify-content-center">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
            </div>
            <input type="submit" class="d-flex justify-content-center mx-auto submit-login-form" value="Me Connecter">
          </form>
        </div>

        <div class="d-flex col-4 not-registrer">
          <a class="nav-link btn-link button-login" href="?controller=UserController&action=showRegistrerView" title="Mentions Légales">Pas encore inscrit ?</a>
        </div>
      </div>
    </div>
  </div>
</div>