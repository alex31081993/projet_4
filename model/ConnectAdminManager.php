<?php

namespace Projet4\Model;


class ConnectAdminManager extends Manager
{
    public function connectAdmin()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM admin WHERE pseudo = :pseudo and pass = :pass');
        $req->execute([
            'pseudo' => $_POST['pseudo'],
            'pass' => $_POST['pass']
        ]);
        $resultat = $req->fetch();

        return $resultat;
    }

}