<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
  header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';

require_once 'includes/functions.inc.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <title></title>
</head>


<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="pp">
          <//?php $rows = fetchStudentPic($conn, $_SESSION["id"]);
          echo '<!--<img src="../../PP_image/' . htmlentities($rows) . '" width="160" height = "160" />';-->
          ?>
        </div>

      </div>
      <div class="col-md-10">
        <nav class="navbar navbar-expand-md navbar-dark ">
 
          
            

          <h3 style=" color: white;"> Welcome <br>
            <?php if ($_SESSION["type"] === "F")
 
              echo fetchFacultyName($conn, $_SESSION["id"]);
            else {
              echo fetchStudentName($conn, $_SESSION["id"]);
            } ?>
          </h3>
 
        
        

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href=""> To-do List </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="dashboard.php"> Dashboard </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Login/includes/logout.inc.php"> Logout</a>
                </li>
              </ul>
            </div>
 main
        </nav>
      </div>

    </div>
        </div>
    <div class="bodyLibrary">
        <div class="d-flex justify-content-center">
            <form class="text-center" action="fetchBook.php" method="POST">
                <div class="input-group bx-sdw">
                    <input type="text" placeholder = "Search book name/author" name="searchBook">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary" name="submit">
                            <i class="fa fa-search">
                                
                            </i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <?php while ($rows = mysqli_fetch_assoc($resultData)) { 
					?>
        <div class="row m-b-30">
            <div class="col-lg-12 box-ptn">
                <div class="widget-box bg-white" style="box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.2), 0 1px 20px 0 rgba(0, 0, 0, 0.19); margin-left: 10px; margin-right:10px; margin-top:10px;">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                          
                                <a class href="#">
                                    <img class="widget-box-img" src="books.jpeg" style="margin-top:10px;margin-bottom:10px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h4 class="sub-til">
                                <a class itemprop="name" href="http://gravitation.web.ua.pt/msampaio/CourseNotes.pdf">
                                    <?php echo $rows["book_title"]?>
                                </a>

                            </h4>
                            <p>
                                <span itemprop="descriptoin"> <?php echo $rows["descriptionBook"]?></span>
                            </p>
                            <p>
                                <b>Author(s):</b>
                                <span itemprop="author"> <?php echo $rows["authors"]?> </span>
                            </p>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <p class="text-right">
                                        <img src="pdf.jpeg" alt="s">
                                        <span class="page-tab" itemprop="noOfPages"><?php echo $rows["pages"]?></span>
                                        <b class="page-tab_1">Pages</b>
                                    </p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }  ?>
		<?php mysqli_stmt_close($stmt); ?>
    </div>

  </div>
</body>