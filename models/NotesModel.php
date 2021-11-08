<?php
include_once "database/DBnote.php";
include_once "BaseModel.php";
class NotesModel extends BaseModel
{
    protected string $table = "notes";

    public function editNotes($data)
    {
        $sql = "UPDATE $this->table SET `title`= ?,`content`= ? ,`typeid`= ? ,`userid` = ? WHERE `id` = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$data['title']);
        $stmt->bindParam(2,$data['content']);
        $stmt->bindParam(3,$data['typeid']);
        $stmt->bindParam(4,$data['userid']);
        $stmt->bindParam(5,$data['id']);
        $stmt->execute();
    }

    public function createNotes($data)
    {
        $sql = "insert into $this->table(`title`,`content`,`typeid`,`userid`,`image`) values (?,?,?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$data["title"]);
        $stmt->bindParam(2,$data["content"]);
        $stmt->bindParam(3,$data["typeid"]);
        $stmt->bindParam(4,$data["userid"]);
        $stmt->bindParam(5,$data["image"]);
        $stmt->execute();
    }
}