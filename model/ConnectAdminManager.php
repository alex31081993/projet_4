<?php

namespace model;


use entity\Admin;

class ConnectAdminManager extends Manager
{

    public function getByPseudo($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM admin WHERE pseudo = :pseudo');
        $req->execute([
            'pseudo' => $pseudo,
        ]);

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $result = new Admin();
        $result->hydrate($data);

        return $result;
    }

}