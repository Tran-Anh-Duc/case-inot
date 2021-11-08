<?php
include_once "models/NoteTypeModel.php";
class NoteTypeController
{
    private NoteTypeModel $noteTypeModel;

    public function __construct()
    {
        $this->noteTypeModel = new NoteTypeModel();
    }

    public function index()
    {
        $noteTypes = $this->noteTypeModel->getAll();
        include_once "view/note-type/list.php";
    }
//    thêm dữ liệu vào bảng
    public function AddNote($data)
    {
        $data2 = [
            "name" => $_REQUEST['name'],
            "description" => $_REQUEST['description'],
        ];
        $this->noteTypeModel->createNote($data2);
        header("location:index.php");
    }
//    hiển thị bảng nhập dữ liệu , để nhập dữ liệu
    public function showAdd()
    {
        include_once "view/note-type/NoteAdd.php";
    }
//    xoa dữ liệu  ở bảng
    public function deleteNote($id)
    {
        if ($this->noteTypeModel->getById($id) !== null){
            $this->noteTypeModel->delete($id);
            header("location:index.php");
        }
    }
//    sửa dữ liệu trong bảng
    public function showEdit()
    {
        $id = $_REQUEST["id"];
       $noteType= $this->noteTypeModel->getById($id);
        include_once "view/note-type/NoteEdit.php";
    }

    public function editNote($id,$data)
    {
        $this->noteTypeModel->getById($id);
        $data3 = [
          "name" => $_REQUEST['name'],
          "description" => $_REQUEST['description'],
          "id" => $_REQUEST['id'],
        ];
        $this->noteTypeModel->editNote($data3);
        header("location:index.php");
    }

}