<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
isset($_SESSION['isuserloggedin']) OR exit('please login');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>item</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {


	         if( document.forms["addgenre"]["GenerType"].value == "" )
	         {
	            alert( "Please provide GenerType !" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add genre</h1></div>
	<?php
	if(isset($result))
	{
		echo " genre added successfully";
	}
	else {
		echo '<form name="addauther" action="'. base_url().'index.php/admin/add_genre" onsubmit="return validateForm()" method="post">
	   Genre Type: <input type="text" name="GenerType"><br>


		    <input type="submit" value="Submit">
		  </form>';
	}
	?>


<a href="<?php echo base_url();?>index.php/user/logout">logout</a>



</body>
</html>
