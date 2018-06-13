<?php
namespace TP_MVC\Blog\Model;
//echo "Modèle CommentManager is ok !<br />";

require_once('manager.php');
class CommentManager extends Manager
{
    public function listComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE post_id = ? ORDER BY date_comment DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function viewComment($viewCommentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id = ?');
        $comment->execute(array($viewCommentId));
        $viewComment = $comment->fetch();
        return $viewComment;
    }

    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
        $addComment = $comments->execute(array($postId, $author, $comment));

        return $addComment;
    }

    public function editComment($viewCommentId, $comment)
    {
        $db = $this->dbConnect();
        $editComment = $db->prepare('UPDATE comments SET comment = :comment, date_comment = NOW() WHERE id = :idC');
         $editComment->execute(array(
        'idC' => $_GET['idC'],
        'comment' => $_POST['comment']

        ));
        return $editComment;
    }
}