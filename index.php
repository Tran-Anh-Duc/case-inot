<?php
include_once "models/NoteTypeModel.php";
include_once "models/NotesModel.php";
include_once "models/UserModel.php";
include_once "controller/NoteTypeController.php";
include_once "controller/NotesController.php";
include_once "controller/AuthController.php";
include_once "models/NoteViewModel.php";
include_once "controller/NoteViewController.php";

session_start();
$noteTypeController = new NoteTypeController();
$notesController = new NotesController();
$authController  = new AuthController();
$noteViewController = new NoteViewController();
$page = (isset($_GET["page"]) ? $_GET['page'] : "");
$username = isset($_SESSION["username"]) ? $_SESSION['username'] : "";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>danh sach loai note</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<?php if ($_SESSION["username"]):?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" >Name:<?php echo $username ;?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=note-view"">NOTE-VIEW <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=note-type"">NOTE-TYPE <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=notes">NOTES</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="index.php?page=logout">Logout</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php endif;?>
<?php
switch ($page) {
    case "note-type":
        $authController->checkAuth();
        $noteTypeController->index();
        break;
    case "notes":
        $authController->checkAuth();
        $notesController->index();
        break;
    case "note-view":
        $noteViewController->index();
        break;
    case "note-add":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
//            show from add
            $noteTypeController->showAdd();
        } else {
            $noteTypeController->AddNote($_REQUEST);
        }
        break;
    case "notes-add":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
//            show from add
            $notesController->showAddNotes();
        } else {
            $notesController->AddNotes($_REQUEST);
        }
        break;
    case "note-delete":
        $noteTypeController->deleteNote($_REQUEST['id']);
        break;
    case "notes-delete":
        $notesController->deleteNotes($_REQUEST['id']);
        break;
    case "note-edit":
        $id = $_GET["id"];
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
//            show from edit
            $noteTypeController->showEdit();
        } else {
            $noteTypeController->editNote($id,$_REQUEST);
        }
        break;
    case "notes-edit":
        $id = $_GET["id"];
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
//            show from edit
            $notesController->showEditNotes();
        } else {
            $notesController->editNotes($id, $_REQUEST);
        }
        break;
        case "login";
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $authController->showFromLogin();
        }else{
            $authController->login($_REQUEST);
        }
        break;
    case "logout":
        $authController->logout();
        break;
    default:
//        $noteTypeController->index();
//        $notesController->index();
        $noteViewController->index();
}
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>
