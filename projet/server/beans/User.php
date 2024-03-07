<?php
class User implements JsonSerializable
{
    private $pk;
    private $pseudo;
    private $isAdmin;


    public function __construct($pk, $pseudo, $isAdmin)
    {
        $this->pk = $pk;
        $this->pseudo = $pseudo;
        $this->isAdmin = $isAdmin;
    }

    public function getPk()
    {
        return $this->pk;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'pk' => $this->pk,
            'pseudo' => $this->pseudo,
            'message' => $this->isAdmin,
        ];
    }

}


?>