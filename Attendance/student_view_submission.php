<?php require_once '../Commons/menu_template.php';
require_once 'includes/functions.inc.php';
require_once 'includes/fetchAttendanceinfo.inc.php';

// echo  $_GET['Ass_ID'];
////$rows = getAssignmentDetails($conn, $_SESSION['Ass_ID']);
//$qtrows =  fetchqpName($conn, $rows["QP_ID"]);
?>

<div class="col-sm-9">
    <div class="container">
        <div>
        <div class ="ann_text_section">
                <h4>Attendance</h4>
                <p>
                </p>
            </div>
            <div>
              <form >
              <?php if(mysqli_num_rows($resultData) > 0)
                      {echo "<table class='table'>
                            <thead>";
                      echo "<tr>";
                        echo "<th>Lecture Number</th>";
                        //echo "<th>Student ID</th>";
                        echo "<th>Date of Lecture</th>";
                        echo "<th>Attendance</th>";
                        //echo "<th>Marks</th>";
                        echo "</tr>";
                        echo "</thead>
                              <tbody>";
                        $count = 1;
              ?>
              <?php while($row = mysqli_fetch_assoc($resultData))
              {

                echo "<tr>";
                  echo "<th scope='row'>".$count."</th>";
                  echo "<td>" . $row['Date_of_class'] . "</td>";
                  echo "<td>" . $row['Attendance'] . "</td>";
                  //echo "<td>"  .$row["Sub_marks"]. "</td>";
                echo "</tr>";
                    $count = $count +1;

              }
              echo "</table>";}
              else{
                echo "No lectures yet.";
              }
              ?>

              
              </form>
            </div>

        </div>
    </div>
</div>

<?php require_once '../Commons/twitter_template.php' ?>
