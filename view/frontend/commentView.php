<?php $title = "modifier un commentaire !" ?>
<?php //echo "Vue d'un post is ok !<br />"; ?>

<?php ob_start(); ?>
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
<h2>Commentaire à modifier :</h2>
<div class="comments">

            <p class="author"><strong><?= htmlspecialchars($viewComment['author']) ?></strong> le <?= $viewComment['date_comment_fr'] ?></p>
            <p class="comment"><?= nl2br(htmlspecialchars($viewComment['comment'])) ?></p>
</div>
<div class="form">
    <form action="index.php?action=editComment&amp;idC=<?= $viewComment['id'] ?>&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <p class="author"><strong><?= htmlspecialchars($viewComment['author']) ?></strong>
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"><?php echo $viewComment['comment'] ?></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require'template.php'; ?>
