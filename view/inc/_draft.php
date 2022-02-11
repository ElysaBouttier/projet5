<h3><u>Brouillons enregistrés</u></h3>
<br />
<br />
<!-- Table on pannel config -->
<table class="table table-striped table-hover" id="onlinePosts">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Dernière modification</th>
            <th class="pannel-th-action">Action</th>
        </tr>
    </thead>
    <?php
    if($draftsPagination!=null){
        foreach ($draftsPagination as $index => $draft) {
    
        ?>
        <tbody>
        <tr>
            <td><a href="?controller=PostController&action=showPostById&id=<?= $draft->getId() ?>"
                   title="Lire le billet"><?= (html_entity_decode($draft->getTitle())) ?></a></td>
            <td><?= substr(nl2br(html_entity_decode($draft->getContent())), 0,100) ?></td>
            <td class="pannel-td-date"><?= $draft->getUpdateDate() ?></td>
            <td class="pannel-td-action">
                <a href="?controller=PostController&action=showEditPostView&id=<?= $draft->getId() ?>"
                   title="Modifier le billet">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="?controller=PostController&action=deletePost&id=<?= $draft->getId() ?>"
                   title="Supprimer le billet"
                   onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce Brouillon ?'))">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        </tbody>
        <?php
    }}
    ?>
</table>
<?php
   $draftsNum->render();
?>