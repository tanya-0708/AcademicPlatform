<?php session_start();
  require_once 'dbh.inc.php';
  $date = date("Y/m/d");
  if (isset($_POST['submit'])) {
    $stmt = mysqli_prepare($conn, "SELECT * from attendance_info where Class_ID=? and Course_ID=? and Date_of_class=?");
   
    mysqli_stmt_bind_param($stmt, "sss", $_SESSION['Class_ID'], $_SESSION['Course_ID'], $date);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($resultData) > 0)
    {
      $stmt1 = mysqli_prepare($conn, "UPDATE attendance_info SET Attendance = ? WHERE S_ID = ?");
      
      foreach ($_POST['sh_grade'] as $i => $gr) {
          $id = $_POST['sh_id'][$i];
          mysqli_stmt_bind_param($stmt1, "ss", $gr, $id);
          mysqli_stmt_execute($stmt1);
      
      }
    }
    else{
      $stmt1 = mysqli_prepare($conn, "INSERT into attendance_info values (?,?,?,?,?)");
      foreach ($_POST['sh_grade'] as $i => $gr) {
        $id = $_POST['sh_id'][$i];
        mysqli_stmt_bind_param($stmt1, "sssss", $_SESSION['Class_ID'],$_SESSION['Course_ID'], $id, $gr, $date);
        mysqli_stmt_execute($stmt1);
    }
  }
      


  header('location: ../teacher_view_submission.php');
}

 ?>
