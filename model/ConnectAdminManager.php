<?php

namespace model;


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
        $result = $req->fetch();

        return $result;
    }

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