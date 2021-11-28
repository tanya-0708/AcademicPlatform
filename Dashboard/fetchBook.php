<?php session_start();
    if(isset($_POST['submit']))
    {
        
        
        $_SESSION["bookKeyword"] = $_POST["searchBook"];

        echo  $_SESSION["bookKeyword"];
        header("location: eLibrary.php");
    }
    else{

    }   
?>