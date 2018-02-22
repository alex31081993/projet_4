<?php

namespace Projet4\model;

require_once("model/Manager.php");

class PostAdminManager extends Manager
{
    public function postContent( $content)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('INSERT INTO posts( content, creation_date) VALUES( ?, NOW())');
        $affectedLines = $contents->execute(array( $content));

        return $affectedLines;
    }    
}