<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
isset($_SESSION['isuserloggedin']) OR exit('please login');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>library</title>
	<script type="text/javascript">
		 <!--
				// Form validation code will come here.
				function validateForm()
				{


					 if( document.forms["additem"]["DateofPublishing"].value == "" )
					 {
							alert( "Please provide DateofPublishing!" );
							return false;
					 }
					 if( document.forms["additem"]["isbnNumber"].value == "" )
					 {
							alert( "Please provide isbnNumber!" );
							return false;
					 }

					 if( document.forms["additem"]["ItemTitle"].value == "" )
					 {
							alert( "Please provide ItemTitle!" );
							return false;
					 }
					 if( document.forms["additem"]["NumberPage"].value == "" )
					{
						 alert( "Please provide NumberPage !" );
						 return false;
					}
					if( document.forms["additem"]["PrintDay"].value < 0 )

					 {
							alert( "Please provide PrintDay!" );
							return false;
					 }


					if( document.forms["additem"]["bestcollection"].value == "" )
					{
						 alert( "Please provide bestcollection!" );
						 return false;
					}
					if( document.forms["additem"]["EditionNumber"].value == "" )
					{
						 alert( "Please provide EditionNumber!" );
						 return false;
					}

					if( document.forms["additem"]["FormType"].value == "" )
					{
						 alert( "Please provide FormType!" );
						 return false;
					}
					if( document.forms["additem"]["AutherName"].value == "" )
					{
						 alert( "Please provide date of AutherName!" );
						 return false;
					}
					if( document.forms["additem"]["GenerType"].value == "" )
					{
						 alert( "Please provide number of page!" );
						 return false;
					}





				}
		 //-->
	</script>
	</head>
</head>
<body>
  <div><h1>Add ietm</h1></div>
  <form name="addbook" action="<?php echo base_url(); ?>index.php/admin/add_ietm_result" onsubmit="return validateForm()" method="post">

   ItemTitle: <input type="text" name="ItemTitle"><br>
   NumberPage: <input type="number" name="NumberPage"><br>


	 PrintDay: <input type="date" name="PrintDay"><br>
	 bestcollection: <input type="text" name="bestcollection"><br>
	 DateofPublishing: <input type="date" name="DateofPublishing"><br>
	 isbnNumber: <input type="text" name="isbnNumber"><br>

   <?php



					 echo '<br><br>AutherName <br>';
					 //print_r($autherList);
					 foreach ($autherList as $auther)
					 {
						 echo '<input type="checkbox" name="auther[]" value="'.$auther->AutherId.'">'.$auther->AutherName.'<br>';
					 }
					 echo '<br><br>GenerType <br>';

					 foreach ($genrerList as $gener)
					 {
						 echo '<input type="checkbox" name="genre[]" value="'.$gener->GenreId.'">'.$gener->GenerType.'<br>';
					 }
					 echo '<br><br>EditionNumber <br>';

					foreach ($editionList as $edition)
					{
						echo '<input type="checkbox" name="edition[]" value="'.$edition->EditionId.'">'.$edition->EditionNumber.'<br>';
						}
						echo '<br><br>FormType <br>';

						foreach ($formList as $form)
						{
							echo '<input type="checkbox" name="form[]" value="'.$form->FormId.'">'.$form->FormType.'<br>';
						 }


						echo'  <input type="submit" value="Submit">
						</form>';

?>



	</body>
	</html>
