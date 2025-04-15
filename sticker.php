<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['Apply']))
{

$regno=$_POST['regNo'];
$fname=$_POST['fname'];
$contactno=$_POST['contact'];
$hno=$_POST['hno'];
$type=$_POST['type'];
$plate=$_POST['plate'];	
$colour=$_POST['colour'];

 // File upload directory
    $uploadDir = 'C:\XAMPP\htdocs/';
	
    
    // Handle file uploads
    $licensePath = NULL;
    $receiptPath = NULL;
 // Handle license image upload
    if (isset($_FILES['imageL']) && $_FILES['imageL']['error'] == 0) {
        // Generate the absolute path for the license image
        $licenseFileName = $uploadDir . 'imageL/' . basename($_FILES['imageL']['name']);
        if (move_uploaded_file($_FILES['imageL']['tmp_name'], $licenseFileName)) {
            $licensePath = $licenseFileName; // Store the file path
        } else {
            // Handle error if upload fails
            $licensePath = 'C:/XAMPP/htdocs/hostelsystem/hostel mgmt PHP/hostel/default_license.jpg'; // Default image if upload fails
        }
    } else {
        // If no file uploaded, use default image
        $licensePath = 'C:/XAMPP/htdocs/hostelsystem/hostel mgmt PHP/hostel/default_license.jpg';
    }

    // Handle receipt image upload
    if (isset($_FILES['imageR']) && $_FILES['imageR']['error'] == 0) {
        // Generate the absolute path for the receipt image
        $receiptFileName = $uploadDir . 'imageR/' . basename($_FILES['imageR']['name']);
        if (move_uploaded_file($_FILES['imageR']['tmp_name'], $receiptFileName)) {
            $receiptPath = $receiptFileName; // Store the file path
        } else {
            // Handle error if upload fails
            $receiptPath = 'C:/XAMPP/htdocs/hostelsystem/hostel mgmt PHP/hostel/default_receipt.jpg'; // Default image if upload fails
        }
    } else {
        // If no file uploaded, use default image
        $receiptPath = 'C:/XAMPP/htdocs/hostelsystem/hostel mgmt PHP/hostel/default_receipt.jpg';
    }

    // Insert data into the database with file paths
    $query = "INSERT INTO vehicle (regNo, firstName, contactNo, type, plateno, colour, license, receipt, hno) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sssssssss', $regno, $fname, $contactno, $type, $plate, $colour, $licensePath, $receiptPath, $hno);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Vehicle permission application submitted successfully');</script>";
    } else {
        echo "<script>alert('Error submitting application');</script>";
    }
	
	
}
	

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
	<title>Vehicle Permission Applyment</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
	<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Vehicle Permission Applyment</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">

Apply Form : 
</div>
									

<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
								
								

<div class="form-group">
<label class="col-sm-2 control-label"> Student ID : </label>
<div class="col-sm-8">
<input type="text" name="regNo" id="regNo"  class="form-control" required="required" value="<?php echo $row->regNo;?>" readonly >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>"   required="required" readonly >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" maxlength="10" value="<?php echo $row->contactNo;?>" required="required" readonly>
</div>
</div>


<?php } ?>

<div class="form-group">
<label class="col-sm-2 control-label">House Number: </label>
<div class="col-sm-8">
<input type="hno" name="hno" id="hno"  class="form-control" value="House Number" >
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
	
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle type: </label>
<div class="col-sm-8">
<input type="type" name="type" id="type"  class="form-control" value="Vehicle type" >
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>	
	
<div class="form-group">
<label class="col-sm-2 control-label">Plate Number: </label>
<div class="col-sm-8">
<input type="plate" name="plate" id="plate"  class="form-control" value="Plate number" >
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>	
	
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Colour(car): </label>
<div class="col-sm-8">
<input type="colour" name="colour" id="colour"  class="form-control" value="Vehicle colour" >
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>	
	
	
	
	
<div class="form-group">
<label class="col-sm-2 control-label">License: </label>
<div class="col-sm-8">
 <label for="fileUpload">Select image:</label>
        <input type="file" name="imageL" id="imageL" accept="image/*">
        
</div>
</div>
	
<div class="form-group">
<label class="col-sm-2 control-label">Receipt: </label>
<div class="col-sm-8">
 <label for="fileUpload">Select image:</label>
        <input type="file" name="imageR" id="imageR" accept="image/*">
</div>
</div>	

<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="Apply" Value="Apply" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
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
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</html>