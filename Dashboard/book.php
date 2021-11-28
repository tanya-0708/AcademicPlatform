<?php 

        $name =$_SESSION['bookKeyword'];
        $name = "%$name%";
        $sql = "SELECT * from e_library where book_title LIKE ? or descriptionBook LIKE ? or authors LIKE ?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $name, $name, $name);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        