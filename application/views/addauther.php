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


	         if( document.forms["addauther"]["AutherName"].value == "" )
	         {
	            alert( "Please provide AutherName !" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add Auther</h1></div>
	<?php
	if(isset($result))
	{
		echo " auther added successfully";
	}
	else {
		echo '<form name="addauther" action="'. base_url().'index.php/user/add_auther" onsubmit="return validateForm()" method="post">
	   Auther Name: <input type="text" name="AutherName"><br>


		    <input type="submit" value="Submit">
		  </form>';
	}
	?>

<a href="<?php echo base_url();?>index.php/user/logout">logout</a>




</body>
</html>
