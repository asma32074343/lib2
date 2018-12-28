<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>admin lognin </title>


</head>
<body>

<div><h1><mark>login for admin</mark></h1></div>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["code"]["admincode"].value == "" )
	         {
	            alert( "enter code" );
	            return false;
	         }


	      }
	   //-->
	</script>
</head>
<body>

	<form name="loginadmin" action="<?php echo base_url(); ?>index.php/admin/loginrequestadmin" onsubmit="return validateForm()" method="post">
	 code<br><input type="password" name="admincode"><br>
	 <input type="submit" value="login">
	 </form>

</body>
</html>


</body>
</html>
