<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>DashBoard</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
	.brand
	{
		height: 65px;
	}
	
	.logo{height:  60px}
	</style>
</head>

<body>
<?php include("includes/header.php");?>

	<div class="ts-main-content">
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">&nbsp;</h2>
						<h2 class="page-title">Room Available</h2>
<div class="row">
			  <div class="col-md-12">
								<div class="row">
								
 <?php
                          $sqlc="SELECT * FROM rooms" ;
						
                          $resultc = $mysqli->query($sqlc);
					
                          while($rowc = $resultc->fetch_assoc()) {
                          ?>
                            <div class="col-md-4 mt-5">
                              <?php
                              $sql2 = "SELECT room_no,hno,status FROM rooms ";
                              $result2 = $mysqli->query($sql2);
                              if(mysqli_num_rows($result2) > 0 && $rowc['status']=="Occupied" ){
                                echo "<button class='form-control'; style='background-color:red; color:white; pointer-events: none;'>";
                                echo '<i class="fa-thin fa fa-bed"></i> ';
                                echo "House: ".$rowc["hno"] ;
								echo "&nbsp;";
								echo "Room : ".$rowc["room_no"] ;  
                                echo "</button>";
                              }else{
								  
                                echo "<button class='form-control'; style='background-color:green; color:white;'>";
                                echo '<i class="fa-thin fa fa-bed"></i>';
                                echo "House: ".$rowc["hno"] ;
								echo "&nbsp;";
								echo "Room : ".$rowc["room_no"] ;
                                echo "</button>";
                              }
                              
                              ?>
                              </button>
                            </div>
                          <?php
                          }
                          ?>

									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
								</div>
							</div>
</div>





					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>
&nbsp;



<style> .foot{text-align: center; border: 1px solid black;}</style>
</html>
