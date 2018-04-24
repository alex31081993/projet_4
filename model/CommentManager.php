<?php

namespace model;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY report DESC');
        $comments->execute(array($postId));

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
        $affectedLines = $contents->execute(array($Id));

        return $affectedLines;
    }

    public function getsCommentReport()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE report = 1 ORDER BY report DESC');
        $comments->execute(array());

        return $comments;
    }

    public function reportCommentVerified($Id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('UPDATE comments set report = 2 WHERE id = ? ');
        $affectedLines = $contents->execute(array($Id));

        return $affectedLines;
    }
}