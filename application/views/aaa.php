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
          if( document.forms["showceatacount"]["username"].value == "" )
          {
             alert( "enter username" );
             return false;
          }

          if( document.forms["showceatacount"]["password"].value == "" )
          {
             alert( "enter password" );
             return false;
          }
          if( document.forms["showceatacount"]["name"].value == "" )
          {
             alert( "enter name" );
             return false;
          }

          if( document.forms["showceatacount"]["useremail"].value == "" )
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
  <?php
  if(isset($result))
  {
    echo " congradulation you are member now you can login ";
  }
  else {
    echo '<form name="adduser" action="'. base_url().'index.php/admin/add_user" onsubmit="return validateForm()" method="post">
    name: <input type="text" name="name"><br>
 useremail: <input type="email" name="useremail"><br>
   username: <input type="text" name="username"><br>
password: <input type="password" name="password"><br>


        <input type="submit" value="Submit">
      </form>';
  }
  ?>

<br><br>

<a href="<?php echo base_url();?>index.php/admin/userlogin">userlogin</a>



</body>
</html>
