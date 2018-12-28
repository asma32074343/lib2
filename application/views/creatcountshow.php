<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>

  <script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {
          if( document.forms["creatcountshow"]["Name"].value == "" )
          {
             alert( "enter username" );
             return false;
          }

          if( document.forms["creatcountshow"]["Password	"].value == "" )
          {
             alert( "enter password" );
             return false;
          }
          if( document.forms["creatcountshow"]["Username	"].value == "" )
          {
             alert( "enter name" );
             return false;
          }

          if( document.forms["creatcountshow"]["UserEmail	"].value == "" )
          {
             alert( "enter email" );
             return false;
          }


	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add user</h1></div>
  <form name="adduser" action="<?php echo base_url(); ?>index.php/user/creatcountresult" onsubmit="return validateForm()" method="post">
	  Name: <input type="text" name="Name"><br>
	Password: <input type="password" name="Password"><br>
   Username: <input type="text" name="Username"><br>
  UserEmail: <input type="email" name="UserEmail"><br>
	<?php




		  echo'  <input type="submit" value="creat_count">
		  </form>';

	?>






</body>
</html>
