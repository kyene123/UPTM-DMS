<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// DELETE action
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $adn = "DELETE FROM vehicle WHERE id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Application Rejected');</script>";
}

// APPROVE action
if (isset($_GET['app'])) {
    $id = intval($_GET['app']);
    // Move the record to the approved_vehicles table
    $adn_select = "SELECT * FROM vehicle WHERE id=?";
    $stmt_select = $mysqli->prepare($adn_select);
    $stmt_select->bind_param('i', $id);
    $stmt_select->execute();
    $res = $stmt_select->get_result();
    $vehicle = $res->fetch_object();
    $stmt_select->close();

    // Insert the selected record into the approved_vehicles table
    $adn_insert = "INSERT INTO holder (regNo,firstName,contactNo,type,plateno,colour,license,receipt,hno)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $mysqli->prepare($adn_insert);
    $stmt_insert->bind_param('sssssssss', 
        $vehicle->regNo, 
        $vehicle->firstName, 
        $vehicle->contactNo, 
        $vehicle->type, 
        $vehicle->plateno, 
        $vehicle->colour, 
        $vehicle->license, 
        $vehicle->receipt, 
        $vehicle->hno
    );
    $stmt_insert->execute();
    $stmt_insert->close();

    // After inserting into the approved_vehicles table, delete the record from the vehicle table
    $adn_delete = "DELETE FROM vehicle WHERE id=?";
    $stmt_delete = $mysqli->prepare($adn_delete);
    $stmt_delete->bind_param('i', $id);
    $stmt_delete->execute();
    $stmt_delete->close();

    echo "<script>alert('Application Approved');</script>";
}
?>
<!doctype html>
<html lang="en" class="no-js" enctype="multipart/form-data">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Permission Applyment pending</title>
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
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">&nbsp;</h2>
						<h2 class="page-title">Manage Applyment</h2>
<div class="panel panel-default">
		  <div class="panel-heading">Applyment list:</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No.</th>
											<th>Student Id</th>
											<th>Name</th>
											<th>Contact Number</th>
											<th>House Number</th>
											<th>Vehicle type</th>
											<th>Plate Number</th>
											<th>Colour</th>
											<th>License</th>
											<th>Receipt</th>
											<th style="display: none">Fees (PM) </th>
                                            <th style="display: none">Access Card</th>
											<th style="display: none">Posting Date  </th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot  style="display: none">
										<tr>
											<th style="display: none">Wno.</th>
											<th style="display: none">Seater</th>
											<th style="display: none">Room No.</th>
										
											<th  style="display: none">Fees (PM) </th>
											<th style="display: none">Posting Date  </th>
											<th style="display: none">Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php
// Prepare the query
$ret = "SELECT * FROM vehicle";
$stmt = $mysqli->prepare($ret);

// Execute the query
$stmt->execute();

// Get the result
$res = $stmt->get_result();

// Display the data
$cnt = 1;
while ($row = $res->fetch_object()) {
    $licensePath = $row->license;  // The file path to the license image
    $receiptPath = $row->receipt;  // The file path to the receipt image
	
	
    ?>
    <tr>
        <td><?php echo $cnt; ?></td>
        <td><?php echo $row->regNo;?></td>
        <td><?php echo $row->firstName; ?></td>
		<td><?php echo $row->contactNo; ?></td>
        <td><?php echo $row->hno; ?></td>
        <td><?php echo $row->type; ?></td>
        <td><?php echo $row->plateno; ?></td>
        <td><?php echo $row->colour; ?></td>
        
        <!-- Display the license image (if it exists) -->
        <td>
           <?php 
            if (!empty($licensePath) && file_exists($licensePath)) {
                echo "<img src='" .$licensePath . "' width='200' height='200'>";
            } else {
                echo "No License Image";
            }
            ?>

        </td>

        <!-- Display the receipt image (if it exists) -->
        <td>
             <?php 
            if (!empty($receiptPath) && file_exists($receiptPath)) {
                echo "<img src='" .$receiptPath.  "' width='200' height='200'>";
            } else {
                echo "No Receipt Image";
            }
            ?>
        </td>
        
        <td>
            <a href="pending.php?del=<?php echo $row->id; ?>" onclick="return confirm('Do you want to reject');">
                <i class="fa fa-close"></i>
            </a>
			 <a href="pending.php?app=<?php echo $row->id; ?>" onclick="return confirm('Do you want to Approve');">
                <i class="fa fa-check"></i>
            </a>
        </td>
		
    </tr>
    <?php
    $cnt++;
}
?>

										
									</tbody>
								</table>

								
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

</body>

</html>
