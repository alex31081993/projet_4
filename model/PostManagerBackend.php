<?php

namespace model;


class PostManagerBackend extends Manager
{
    public function postContent($id, $title, $chapeau, $content)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('INSERT INTO posts(id, title, chapeau, content, creation_date) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $contents->execute(array($id, $title, $chapeau, $content));

        return $affectedLines;
    }

    public function deleteContent($id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('DELETE FROM posts WHERE id =?');
        $affectedLines = $contents->execute(array($id));


        return $affectedLines;
    }

    public function deleteComments($id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('DELETE FROM comments WHERE post_id =?' );
        $affectedLines = $contents->execute(array($id));

        return $affectedLines;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('DELETE FROM comments WHERE id =?' );
        $affectedLines = $contents->execute(array($id));

        return $affectedLines;
    }

    public function updatePost($title, $chapeau, $content, $id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('UPDATE posts set title = ?, chapeau = ?, content = ?, creation_date = now() WHERE id = ? ');
        $affectedLines = $contents->execute(array($title, $chapeau, $content, $id));

        return $affectedLines;

    }
}