<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=academicportal', 'admin', 'root');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event,SF_id) 
 VALUES (:title, :start_event, :end_event, :SF_id)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':SF_id' =>  $_POST['id1']
  )
 );
}




