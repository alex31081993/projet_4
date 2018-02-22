<?php

namespace controller;

class FrontendAdmin
{
    public function addPost($content)
    {
        $postManager = new \Projet4\Model\PostAdminManager();

        $affectedLines = $postManager->postContent($content);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php');
        }
    }    
}