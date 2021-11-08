<?php
include_once  "../models/NoteViewModel.php";
class NoteViewController
{

    private NoteViewModel $noteViewModel;

    public function __construct()
    {
        $this->noteViewModel = new NoteViewModel();
    }

    public function index()
    {
        $noteViews = $this->noteViewModel->getAll();
        include_once "view/noteview/listView.php";
    }

}