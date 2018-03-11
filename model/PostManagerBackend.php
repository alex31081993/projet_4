<?php

namespace Projet4\Model;

require_once('model/Manager.php');


class PostManagerBackend extends Manager
{
    public function postContent($id, $title, $content)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('INSERT INTO posts(id, title, content, creation_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $contents->execute(array($id, $title, $content));

        return $affectedLines;
    }

    public function deleteContent()
    {
        $db = $this->dbConnect();
        $id = $_GET['id'];
        $contents = $db->prepare('DELETE FROM posts WHERE id =' . $id);
        $affectedLines = $contents->execute(array());


        return $affectedLines;
    }

    public function deleteComments()
    {
        $db = $this->dbConnect();
        $id = $_GET['id'];
        $contents = $db->prepare('DELETE FROM comments WHERE id =' . $id );
        $affectedLines = $contents->execute(array());

        return $affectedLines;
    }
    public function updatePost($title, $content)
    {
        $db = $this->dbConnect();
        $id = $_GET['id'];
        $contents = $db->prepare('UPDATE posts set title = ?, content = ?, creation_date = now() WHERE id = ? ');
        $affectedLines = $contents->execute(array($title, $content, $id));

        return $affectedLines;

    }
}