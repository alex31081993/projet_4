<?php

namespace model;

use entity\Comment;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY report = 1 DESC');
        $req->execute(array($postId));

        $comments = [];
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->hydrate($data);
            $comments[] = $comment;
        }
        return $comments;

    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, report, comment_date) VALUES(?, ?, ?,0, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function reportComment($Id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('UPDATE comments set report = 1 WHERE id = ? ');
        $data = $contents->execute(array($Id));

        $reportComment = new Comment();
        $reportComment->hydrate($data);

        return $reportComment;
    }

    public function getsCommentReport()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE report = 1 ORDER BY report DESC');
        $req->execute(array());

        $comments = [];
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->hydrate($data);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function reportCommentVerified($Id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('UPDATE comments set report = 2 WHERE id = ? ');
        $data = $contents->execute(array($Id));

        $reportCommentVerified = new Comment();
        $reportCommentVerified->hydrate($data);

        return $reportCommentVerified;
    }

    public function getCommentById($id)
    {
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM comments WHERE id = ?');
	    $req->execute(array($id));
	    $data = $req->fetch(\PDO::FETCH_ASSOC);
	    $comment = new Comment();
	    $comment->hydrate($data);
	    return $comment;
    }

}