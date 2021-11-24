<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
	header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';


if (isset($_SESSION["Course_ID"]))
	unset($_SESSION["Course_ID"]);

if ($_SESSION["type"] === "F") {
	require_once "includes/faculty_sql.inc.php";
	if (isset($_SESSION["Class_ID"]))
		unset($_SESSION["Class_ID"]);
} else if ($_SESSION["type"] === "S")
	require_once "includes/student_sql.inc.php";

// echo $_SESSION['Class_ID'];

require_once 'essentials/header.php';
?>


<div class="row">
	<div class="col-sm-9">
		<div class="classes p-8 m-20">
			<div class="row">
				<?php if ($_SESSION["type"] === "S") { ?>
					<?php while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
					?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="blue-green">

								<h3><a href="includes/redirect.inc.php?Course_ID=<?php echo $rows["Course_ID"]; ?>">
										<?php echo fetchCourseName($conn, $rows["Course_ID"]); ?>

									</a>
								</h3>
								<p><?php echo fetchFacultyName($conn, $rows["F_ID"]); ?>
								</p>
							</div>
						</div>
					<?php }  ?>
					<?php mysqli_stmt_close($stmt); ?>
				<?php } ?>

				<?php if ($_SESSION["type"] === "F") { ?>
					<?php while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
					?>
						<div class="col-lg-4 col-md-6">
							<div class="blue-green">

								<h3><a href="includes/redirect.inc.php?Course_ID=<?php echo $rows["Course_ID"]; ?>&Class_ID=<?php echo $rows["Class_ID"]; ?>">
										<?php echo fetchCourseName($conn, $rows["Course_ID"]); ?>

									</a>
								</h3>
								<?php $rows = fetchClassInfo($conn, $rows["Class_ID"]); ?>
								<p><?php echo "B.Tech " . $rows["Branch"] . ", " . "Sem: " . $rows["Semester"] . ", Section: " . $rows["Section"]; ?> </p>
							</div>
						</div>
					<?php }  ?>
					<?php mysqli_stmt_close($stmt); ?>
				<?php } ?>

                <div class="col-lg-4 col-md-6 col-sm-12">
							<div class="blue-green">

								<h3><a href="lab.php">
											Virtual Labs

									</a>
								</h3>
										<p> Your personlized IDE at your hand
										</p>
							</div>
			    </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
							<div class="blue-green">

								<h3><a href="eLibrary.php">
											E-Library

									</a>
								</h3>
										<p> Read and download the books
										</p>
							</div>
			    </div>
                
			</div>
           
		</div>
        
	</div>
    
	<div class="col-sm-3" style="background-color: #ffff;">
		<div class="calendar">
			<div class="wrapper">
				<div id="calendari"></div>
	
			</div>
			<script>
				var mesos = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

var dies = [
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thersday',
    'Friday',
    'Saturday'
];

var dies_abr = [
    'Su',
    'Mo',
    'Tu',
    'We',
    'Th',
    'Fr',
    'Sa'
];

Number.prototype.pad = function(num) {
    var str = '';
    for(var i = 0; i < (num-this.toString().length); i++)
        str += '0';
    return str += this.toString();
}

function calendari(widget, data)
{

    var original = widget.getElementsByClassName('actiu')[0];

    if(typeof original === 'undefined')
    {
        original = document.createElement('table');
        original.setAttribute('data-actual',
			      data.getFullYear() + '/' +
			      data.getMonth().pad(2) + '/' +
			      data.getDate().pad(2))
        widget.appendChild(original);
    }

    var diff = data - new Date(original.getAttribute('data-actual'));

    diff = new Date(diff).getMonth();

    var e = document.createElement('table');

    e.className = diff  === 0 ? 'amagat-esquerra' : 'amagat-dreta';
    e.innerHTML = '';

    widget.appendChild(e);

    e.setAttribute('data-actual',
                   data.getFullYear() + '/' +
                   data.getMonth().pad(2) + '/' +
                   data.getDate().pad(2))

    var fila = document.createElement('tr');
    var titol = document.createElement('th');
    titol.setAttribute('colspan', 7);

    var boto_prev = document.createElement('button');
    boto_prev.className = 'boto-prev';
    boto_prev.innerHTML = '&#9666;';

    var boto_next = document.createElement('button');
    boto_next.className = 'boto-next';
    boto_next.innerHTML = '&#9656;';

    titol.appendChild(boto_prev);
    titol.appendChild(document.createElement('span')).innerHTML = 
        mesos[data.getMonth()] + '<span class="any">' + data.getFullYear() + '</span>';

    titol.appendChild(boto_next);

    boto_prev.onclick = function() {
        data.setMonth(data.getMonth() - 1);
        calendari(widget, data);
    };

    boto_next.onclick = function() {
        data.setMonth(data.getMonth() + 1);
        calendari(widget, data);
    };

    fila.appendChild(titol);
    e.appendChild(fila);

    fila = document.createElement('tr');

    for(var i = 1; i < 7; i++)
    {
        fila.innerHTML += '<th>' + dies_abr[i] + '</th>';
    }

    fila.innerHTML += '<th>' + dies_abr[0] + '</th>';
    e.appendChild(fila);

    /* Obtinc el dia que va acabar el mes anterior */
    var inici_mes =
        new Date(data.getFullYear(), data.getMonth(), -1).getDay();

    var actual = new Date(data.getFullYear(),
			  data.getMonth(),
			  -inici_mes);

    /* 6 setmanes per cobrir totes les posiblitats
     *  Quedaria mes consistent alhora de mostrar molts mesos 
     *  en una quadricula */
    for(var s = 0; s < 6; s++)
    {
        var fila = document.createElement('tr');

        for(var d = 1; d < 8; d++)
        {
	    var cela = document.createElement('td');
	    var span = document.createElement('span');

	    cela.appendChild(span);

            span.innerHTML = actual.getDate();

            if(actual.getMonth() !== data.getMonth())
                cela.className = 'fora';

            /* Si es avui el decorem */
            if(data.getDate() == actual.getDate() &&
	       data.getMonth() == actual.getMonth())
		cela.className = 'avui';

	    actual.setDate(actual.getDate()+1);
            fila.appendChild(cela);
        }

        e.appendChild(fila);
    }

    setTimeout(function() {
        e.className = 'actiu';
        original.className +=
        diff === 0 ? ' amagat-dreta' : ' amagat-esquerra';
    }, 20);

    original.className = 'inactiu';

    setTimeout(function() {
        var inactius = document.getElementsByClassName('inactiu');
        for(var i = 0; i < inactius.length; i++)
            widget.removeChild(inactius[i]);
    }, 1000);

}

calendari(document.getElementById('calendari'), new Date());

			</script>
		</div>
		<a class="twitter-timeline" data-width="400" data-height="750" data-theme="light" href="https://twitter.com/Banasthali_Vid?ref_src=twsrc%5Etfw"> Tweets by Banasthali_Vid
		</a>

		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
		</script>

	</div>
</div>



<footer class="footer">
	<a href="#"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
	</a>
	<a href="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
	</a>
	<a href="#"><i class="fa fa-phone fa-2x" aria-hidden="true"></i>
	</a>
	<a href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
	</a>
	<p>@Copyright 2021 APT567
	</p>
</footer>
</body>

</html>