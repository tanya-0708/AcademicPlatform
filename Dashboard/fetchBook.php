<?php
    if(isset($_POST['submit']))
    {
        session_start();
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        $searchBook = $_POST["searchBook"];
        $resultData = getBooks($conn,$searchBook);
    }
    else{

    }   
