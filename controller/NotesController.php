<?php
include_once "../models/NotesModel.php";
class NotesController
{
    private NotesModel $notesModel;

    public function __construct()
    {
        $this->notesModel = new NotesModel();
    }

    public function index()
    {
        $notes = $this->notesModel->getAll();
        include_once "view/notes/listNotes.php";
    }

//    thêm dữ liệu vào bảng

    public function AddNotes($data)
    {
        $filepath = "";
        if (isset($_FILES["file"])) {
            $filepath = "uploads/" . $_FILES["file"]["name"];

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
                echo "<img src=" . $filepath . " height=200 width=300 />";
            } else {
                echo "Error !!";
            }

        }
        $data2 = [
            "title" => $_REQUEST['title'],
            "content" => $_REQUEST['content'],
            "typeid" => $_REQUEST['typeid'],
            "userid" => $_REQUEST['userid'],
            "image" => $filepath
        ];
        $this->notesModel->createNotes($data2);
        header("location:index.php");
    }

//    hiển thị bảng nhập dữ liệu , để nhập dữ liệu
    public function showAddNotes()
    {
        include_once "view/notes/NotesAdd.php";
    }


//    xoa dữ liệu  ở bảng
    public function deleteNotes($id)
    {
        if ($this->notesModel->getById($id) !== null) {
            $this->notesModel->delete($id);
            header("location:index.php");
        }
    }

//    sửa dữ liệu trong bảng
    public function showEditNotes()
    {
        $id = $_REQUEST["id"];
        $note = $this->notesModel->getById($id);
        include_once "view/notes/NotesEdit.php";
    }

    public function editNotes($id, $data)
    {
        $this->notesModel->getById($id);
        $data3 = [
            "title" => $_REQUEST['title'],
            "content" => $_REQUEST['content'],
            "typeid" => $_REQUEST['typeid'],
            "userid" => $_REQUEST['userid'],
            "id" => $_REQUEST['id'],
        ];
        $this->notesModel->editNotes($data3);
        header("location:index.php");
    }

}