<h3>Commentaires :</h3>
<?php
// For each comments in the blog
foreach ($comments as $comment) {
?>
    <div class="comment-div">
        <div class="comment-user">
            <div>
                <span>
                    <?php
                    echo html_entity_decode($comment->getUsername())
                    ?>
                </span>
            </div>
            <span class="comment-date">
                <?php
                print($comment->getdate());
                ?>
            </span>
        </div>
        <div class="comment-comment">
            <p class="comment-comment-p">
                <?php
                echo html_entity_decode($comment->getContent()) . "<br />";
                if (isset($_SESSION) && !empty($_SESSION) && ($comment->getStatus() < 1)) {
                    echo '<a href="?controller=CommentController&action=alertComment&id=' . $comment->getId() . '&postId=' . $post->getId() . '" onclick="return(confirm(\'ATTENTION ! Voulez-vous vraiment signaler ce commentaire ?\'))">Signaler</a>';
                }
                ?>
            </p>
        </div>
    </div>
<?php
}

?>