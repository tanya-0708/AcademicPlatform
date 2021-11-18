<?php require_once '../Commons/menu_template.php';
      require_once 'includes/functions.inc.php';
      require_once 'includes/fetchAttendanceinfo.inc.php';
      $date = date("Y/m/d");
      
?>

<div class="col-sm-9">
        <div class="container">

          <div >

            <div class ="ann_text_section">
                <?php echo"<h4>Attendance ".$date."</h4>";?>
                <p>Grades in a tabular format.
                </p>
            </div>
            <div>
              
              <form action="includes/SubmitGrades.inc.php" method="post">
              <?php if(mysqli_num_rows($resultData) > 0)
                      {echo "<table class='table'>
                            <thead>";
                      echo "<tr>";
                        echo "<th>Row Number</th>";
                        echo "<th>Student ID</th>";
                        echo "<th>Student Name</th>";
                        echo "<th>Attendance</th>";
                        //echo "<th>Marks</th>";
                        echo "</tr>";
                        echo "</thead>
                              <tbody>";
                        $count = 1;
              ?>
              <?php  
              while($row = mysqli_fetch_assoc($resultData))// && $row1 = mysqli_fetch_assoc($resultData1))
              {

                  echo "<tr>";
                  echo "<th scope='row'>".$count."</th>";
                  echo "<td>".$row["S_ID"]."<input type='hidden' name='sh_id[]' value=".$row["S_ID"]."></td>";
                  echo "<td>" . $row['S_name'] . "</td>";
                  //echo "<td>" . $row['Sub_link'] . "</td>";
                  //echo "<td><input type='text' name='sh_grade[]' value=".$row["Sub_marks"]."></td>"; value=".$row["Attendance"]. <?php createAttendance($conn) 
                  echo "<td><input type='text' name='sh_grade[]' placeholder='Present' value=".fetchAttendance($conn,$row["S_ID"])."></td>";
                echo "</tr>";
                $count = $count +1;

              }
              /*while($row1 = mysqli_fetch_assoc($resultData1))
              {
                echo "<td><input type='text' name='sh_grade[]' placeholder='Present' value=".$row1["Attendance"]."></td>";
                echo "</tr>";
              }*/
              echo "</table>";
              echo "<button type='submit' name='submit'>Submit</button>";

              
            
            }
              else{
                echo "Nobody has submitted the assignment yet.";
              }
              ?>
          </form>
              
            </div>




          </div>
       </div>
</div>

<?php require_once '../Commons/twitter_template.php' ?>
