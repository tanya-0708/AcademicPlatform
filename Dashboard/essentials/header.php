<!DOCTYPE html>
<html>

<head>
    <title>
        Dashboard
    </title>
    <script src="https://kit.fontawesome.com/ab606e87e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="calStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="pp">
                    <?php $rows = fetchStudentPic($conn, $_SESSION["id"]);
                    $s = $rows;
                    //echo $rows;
                    echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:160px;height:160px">';
                    //echo '<img src="data:../PP_image/;base64,' . base64_encode( $rows ) . '" width="160" height = "160" />';
                    ?>
                </div>


            </div>
            <div class="col-lg-10 col-md-10">
                <nav class="navbar navbar-expand-md navbar-dark ">
                    <span>
                        <h3 class="name"> <?php if ($_SESSION["type"] == "F")
                                                echo "Welcome " . fetchFacultyName($conn, $_SESSION["id"]);
                                            else {
                                                # code...
                                                echo "Welcome " . fetchStudentName($conn, $_SESSION["id"]);
                                            } ?>

                        </h3>
                    </span>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item">
                                <a class="nav-link " href="EditProfile.php"> Edit Profile </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="calendar/index.php"> Calendar </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Login/includes/logout.inc.php"> Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>

    </div>