<?php
function fetchAttendance($conn, $id)
{
  $date = date("Y/m/d");
  $sql = "SELECT Attendance from attendance_info where S_ID=? and Date_of_class=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
  mysqli_stmt_bind_param($stmt, "ss", $id, $date);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $rows = mysqli_fetch_assoc($resultData);
  $attendance = $rows["Attendance"];
  mysqli_stmt_close($stmt);
  return $attendance;
}
function createAttendance($conn)
{
  $date = date("Y/m/d");
        $sql = "SELECT S_ID, S_name from student_info where Class_ID=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['Class_ID']);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        while($rows = mysqli_fetch_assoc($resultData))
        {
            $S_ID= $rows["S_ID"];
            $S_name = $rows["S_name"];

           
            $sql1 = "INSERT into attendance_info(Class_ID, Course_ID, S_name, S_ID, Date_of_class) VALUES (?,?,?,?,?);";
            $stmt1 = mysqli_stmt_init($conn);
            
            if(!mysqli_stmt_prepare($stmt1, $sql1)) {
            header("location: ../teacher_template.php?error=stmtfaileduid");
            exit();
            }
            
            mysqli_stmt_bind_param($stmt1, "sssss", $_SESSION['Class_ID'],$_SESSION['Course_ID'], $S_name, $S_ID, $date);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
        mysqli_stmt_close($stmt);

}
