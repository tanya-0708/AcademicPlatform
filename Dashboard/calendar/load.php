<?php 

$connect = new PDO('mysql:host=localhost;dbname=academicportal', 'admin', 'root');

$data = array();

//$query = "SELECT * FROM events where SF_id = ? ORDER BY start_event";
$query = "SELECT * FROM events ORDER BY start_event";

$statement = $connect->prepare($query);

//$statement->execute([$temp]);
$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
  'sf_id' => $row["SF_id"]
  
 );
}

echo json_encode($data);

?>