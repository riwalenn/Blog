<?php $title = htmlspecialchars($post['title']); ?>
<?php //echo "Vue d'un post is ok !<br />"; ?>

<?php ob_start(); ?>
<h1><?php echo htmlspecialchars($post['title']); ?></h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>
<div class="comments">
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
            <p class="author"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_comment_fr'] ?></p>
            <p class="comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?> (<a href="index.php?action=viewComment&amp;idC=<?= $comment['id'] ?>&amp;id=<?= $post['id'] ?>">modifier</a>)</p>
    <?php
    }
    $comments->closeCursor();
    ?>
</div>
    <!-- Affiche le nombre de pages de commentaires à afficher (par convention, une page affiche 5 commentaires) -->
    <p>Page :
        <?php for($looper = 0; $looper <= $nbPagesC; $looper++){
?>
    <a href="index.php?action=Viewpost&page=<?= $looper+1 ?>&amp;id=<?= $post['id'] ?>">
        <?= $looper+1 ?>
    </a>
<?php
    }
?>
    </p>
<div class="form">
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require'template.php'; ?>
