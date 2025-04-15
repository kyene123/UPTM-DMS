<?php
session_start();
include("includes/config.php");
include('includes/checklogin.php');



?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Information</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="hostel.css" rel="stylesheet" type="text/css">

		
	
</head>

<body>
<table width="100%" border="0">
<?php 
	$id=$_GET['id'];
	$ret="select * from registration where id=? ";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			
		
			<tr>
			  <td colspan="2"  class="font"><?php  echo $row->firstName;?>'S <span class="font1"> information &raquo;</span> </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <div align="right">Reg Date : <span class="comb-value"><?php  echo $row->postingDate;?></span></div></td>
  </tr>
  <tr>
			  <td   class="heading" style="color: red;">&nbsp; ROOM RELATED INFO &raquo; </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font1"><table width="100%" border="0">
				  <tr>
                  <td width="32%" valign="top" class="heading">House no : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php  echo $row->hno;?></span></td>
                    </tr>
                <tr>
                  <td width="32%" valign="top" class="heading">Room no : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php  echo $row->roomno;?></span></td>
                    </tr>
                  <tr>
                  <td width="22%" valign="top" class="heading">Seater : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php  echo $row->seater;?></span></td>
                    </tr>
                  
                    <tr>
                    <td width="12%" valign="top" class="heading">Acces Card : </td>
                      <td class="comb-value1"><?php  echo $row->feespm;?></td>
                    </tr>
                 
                    <tr>
                    <td width="12%" valign="top" class="heading">Staying From: </td>
                      <td class="comb-value1"><?php  echo $row->stayfrom;?></td>
                    </tr>
                    <tr>
                    <td width="12%" valign="top" class="heading">Duration: </td>
                      <td class="comb-value1"><?php  echo $row->duration;?></td>
                    </tr>
                  
  <tr>
   <td  class="heading" style="color: red;">Personal Info &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Course: </td>
<td class="comb-value1"><?php  echo $row->course;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Student ID: </td>
<td class="comb-value1"><?php  echo $row->regno;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">First Name: </td>
<td class="comb-value1"><?php  echo $row->firstName;?></td>
</tr>



<tr>
<td width="12%" valign="top" class="heading">Contact No: </td>
<td class="comb-value1"><?php  echo $row->contactno;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Email id: </td>
<td class="comb-value1"><?php  echo $row->emailid;?></td>
</tr>


<tr>
<td width="12%" valign="top" class="heading">Guardian Name: </td>
<td class="comb-value1"><?php  echo $row->guardianName;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Guardian Relation: </td>
<td class="comb-value1"><?php  echo $row->guardianRelation;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Guardian Contact: </td>
<td class="comb-value1"><?php  echo $row->guardianContactno;?></td>
</tr>
<tr>
        <td colspan="2"  class="heading" style="color: red;">Correspondence Address  &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Address: </td>
<td class="comb-value1"><?php  echo $row->corresAddress;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">City: </td>
<td class="comb-value1"><?php  echo $row->corresCIty;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">State: </td>
<td class="comb-value1"><?php  echo $row->corresState;?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Pincode: </td>
<td class="comb-value1"><?php  echo $row->corresPincode;?></td>
</tr>

<?php } ?>


                   				  <tr>
    <td colspan="2" align="right" ><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="35%" class="comb-value"><label>
            <input name="Submit" type="submit" class="txtbox4" value="Prints this Document " onClick="return f3();" />
          </label></td>
          <td width="3%">&nbsp;</td>
          <td width="26%"><label>
            <input name="Submit2" type="submit" class="txtbox4" value="Close this document " onClick="return f2();"  />
          </label></td>
          <td width="8%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
        </tr>
      </table>
        </form>    </td>
  </tr>
                  </table></td>
                </tr>
               
	
                  </table></td>
                </tr>
              </table></td>
  </tr>
		
           
 
	 
    </table></td>
  </tr>

  

  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
