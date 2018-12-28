<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
isset($_SESSION['isuserloggedin']) OR exit('please login');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Students</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {


	         if( document.forms["addedition"]["EditionNumber"].value == "" )
	         {
	            alert( "Please provide EditionNumber !" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add edition</h1></div>
	<?php
	if(isset($result))
	{
		echo " edition  added successfully";
	}
	else {
		echo '<form name="addedition" action="'. base_url().'index.php/admin/resuttedition" onsubmit="return validateForm()" method="post">
	   Edition Number: <input type="text" name="EditionNumber"><br>



		    <input type="submit" value="Submit">
		  </form>';
	}
	?>



<a href="<?php echo base_url();?>index.php/user/logout">logout</a>


</body>
</html>
