<?php
    if($_SESSION['type']==='F')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
        $sql = "SELECT S_ID, S_name from student_info where Class_ID=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['Class_ID']);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        $sql1 = "SELECT Attendance from attendance_info where Class_ID=?;";

        $stmt1 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt1, "s", $_SESSION['Class_ID']);
        mysqli_stmt_execute($stmt1);

        $resultData1 = mysqli_stmt_get_result($stmt1);
    }


    if($_SESSION['type']==='S')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
        $sql = "SELECT * from attendance_info where S_ID=? and Course_ID=?";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../student_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['id'], $_SESSION['Course_ID']);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
    }
