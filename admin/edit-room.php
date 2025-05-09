<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
$id=$_SESSION['id'];
if($_POST['submit'])
{
$seater=$_POST['seater'];
$rmno=$_POST['rmno'];
$fees=$_POST['fees'];
$Hno=$_POST['hno'];
$status=$_POST['status'];
$id=$_GET['id'];
$query="update rooms set seater=?,room_no=?,fees=?,hno=?,status=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('isisss',$seater,$rmno,$fees,$Hno,$status,$id);
$stmt->execute();

header("Location:manage-rooms.php");
echo"<script>alert('Room Details has been Updated successfully');</script>";
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
	<title>Edit Room Details</title>
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
					
						<h2 class="page-title">Edit Room Details </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Room Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from rooms where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
						<div class="hr-dashed"></div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Seater  </label>
					<div class="col-sm-8">
					<input type="text"  name="seater" value="<?php echo $row->seater;?>"  class="form-control"> </div>
					</div>
				 <div class="form-group">
				<label class="col-sm-2 control-label">Room no </label>
		<div class="col-sm-8">
	<input type="text" class="form-control" name="rmno" id="rmno" value="<?php echo $row->room_no;?>" >
	<span class="help-block m-b-none">
													</span>
						 </div>
						</div>
                               
								<div class="form-group">
<label class="col-sm-2 control-label">House No.</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="hno" id="hno" value="<?php echo $row->hno;?>" required="required">
</div>
</div>
											
											
											<div class="form-group">
									<label class="col-sm-2 control-label">Acces Card </label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="fees" value="<?php echo $row->fees;?>" >
												</div>
											</div>
											
											<div class="form-group">
											<label class="col-sm-2 control-label">Status</label>
												<div class="col-sm-8">
				                            <select name="status" class="form-control">
                                            <option value=""><?php echo $row->status;?></option>
                                            <option value="Occupied">Occupied</option>
                                            <option value="Unoccupied">Unoccupied</option>
 
                                            </select>
													</div>
											</div>


<?php } ?>
												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update Room Details ">
												</div>
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
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</script>
</body>

</html>