<h3><u>Articles en lignes</u></h3>
<br />
<br />
<!-- Table on pannel config -->
<table class="table table-striped table-hover" id="onlinePosts">
    <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Date de publication</th>
            <th class="text-center">Dernière modification</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    foreach ($posts as $post) {
    ?>
        <tbody align="center">
            <tr>
                <td><a href="" title="Lire le billet">Titre</a></td>
                <td>Date de création</td>
                <td>Date de modification</td>
                <td align="center">
                    <a href="" title="Modifier le billet">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="" title="Supprimer le billet">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>

<hr>