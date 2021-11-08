<?php
include_once "database/DBnote.php";
include_once "BaseModel.php";

class NoteTypeModel extends BaseModel
{
    protected string $table = "notetype";

    public function editNote($data)
    {
        $sql = "UPDATE $this->table SET `name`= ?,`description`= ? WHERE `id` = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data['name']);
        $stmt->bindParam(2, $data['description']);
        $stmt->bindParam(3, $data['id']);
        $stmt->execute();
    }

    public function createNote($data)
    {
        $sql = "insert into $this->table(`name`,`description`) values (?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["description"]);
        $stmt->execute();
    }
}