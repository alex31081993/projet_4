<?php

namespace Projet4\Model;

require_once('model/Manager.php');


class PostManagerBackend extends Manager
{
    public function postContent($title, $content)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $contents->execute(array($title, $content));

        return $affectedLines;
    }

    public function deleteContent()
    {
        $db = $this->dbConnect();
        $id = $_GET['id'];
        $contents = $db->query('DELETE FROM posts WHERE id =' . $id);


        return $contents;
    }
}