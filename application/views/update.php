<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

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



					 if( document.forms["updateitem"]["ItemTitle"].value == "" )
					 {
							alert( "Please provide ItemTitle!" );
							return false;
					 }
					 if( document.forms["updateitem"]["NumberPage"].value == "" )
					{
						 alert( "Please provide NumberPage !" );
						 return false;
					}
					if( document.forms["updateitem"]["DateofPublishing"].value == "" )
				 {
						alert( "Please provide DateofPublishing !" );
						return false;
				 }
				 if( document.forms["updateitem"]["isbnNumber"].value == "" )
				{
					 alert( "Please provide isbnNumber !" );
					 return false;
				}


					if( document.forms["updateitem"]["bestcollection"].value == "" )
					{
						 alert( "Please provide bestcollection!" );
						 return false;
					}
					if( document.forms["updateitem"]["EditionNumber"].value == "" )
					{
						 alert( "Please provide EditionNumber!" );
						 return false;
					}
					if( document.forms["updateitem"]["PrintDay"].value == "" )
					{
						 alert( "Please provide date of PrintDay!" );
						 return false;
					}
					if( document.forms["updateitem"]["FormType"].value == "" )
					{
						 alert( "Please provide FormType!" );
						 return false;
					}
					if( document.forms["updateitem"]["AutherName"].value == "" )
					{
						 alert( "Please provide date of AutherName!" );
						 return false;
					}
					if( document.forms["updateitem"]["GenerType"].value == "" )
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
  <div><h1> update item</h1></div>
  <form name="addbook" action="<?php echo base_url(); ?>index.php/admin/updateitem" onsubmit="return validateForm()" method="post">

   itemtitle: <input type="text" name="ItemTitle" value="<?php echo $contant->ItemTitle?>"><br>
   numberofpage: <input type="number" name="NumberPage" value="<?php echo $contant->NumberPage?>"><br>

	 isbnnumber: <input type="number" name="isbnNumber" value="<?php echo $contant->isbnNumber?>"><br>
	 DateofPublishing: <input type="date" name="DateofPublishing" value="<?php echo $contant->DateofPublishing?>"><br>
	 printdate: <input type="date" name="PrintDay" value="<?php echo $contant->PrintDay?>"><br>
	 BestCollection: <input type="text" name="bestcollection" value="<?php echo $contant->bestcollection?>"><br>


   <?php




	 echo '<br><br> auther <br>';

	foreach ($autherList as $auther)
	{
		$isthere = 0;
		foreach($auther_has_contant as $selected)
		{
			if($auther->AutherId == $selected->auther_AutherId)
			{
				$isthere = 1;
				break;
			}
		}
		if($isthere == 1)
		{
			echo '<input checked type="checkbox" name="auther[]" value="'.$auther->AutherId.'"> '.$auther->AutherName.'<br>';
		}
		else
		{
			echo '<input type="checkbox" name="auther[]" value="'.$auther->AutherId.'"> '.$auther->AutherName.'<br>';
		}
	}


	echo '<br><br> genre <br>';

	foreach ($genreList as $genre)
	{
		$isthere = 0;
		foreach($genre_has_contant as $selected)
		{
			if($genre->GenreId == $selected->genre_GenreId)
			{
				$isthere = 1;
				break;
			}
		}
		if($isthere == 1)
		{
			echo '<input checked type="checkbox" name="genre[]" value="'.$genre->GenreId.'"> '.$genre->GenerType.'<br>';
		}
		else
		{
			echo '<input type="checkbox" name="genre[]" value="'.$genre->GenreId.'"> '.$genre->GenerType.'<br>';
		}
	}


	echo '<br><br> Format <br>';

	foreach ($formList as $form)
	{
		$isthere = 0;
		foreach($form_has_contant as $selected)
		{
			if($form->FormId == $selected->form_FornId)
			{
				$isthere = 1;
				break;
			}
		}
		if($isthere == 1)
		{
			echo '<input checked type="checkbox" name="form[]" value="'.$form->FormId.'"> '.$form->FormType.'<br>';
		}
		else
		{
			echo '<input type="checkbox" name="form[]" value="'.$form->FormId.'"> '.$form->FormType.'<br>';
		}
	}

	echo '<br><br> Hobbies <br>';

	foreach ($editionList as $edition)
	{
		$isthere = 0;
		foreach($edition_has_contant as $selected)
		{
			if($edition->EditionId == $selected->edition_EditionId)
			{
				$isthere = 1;
				break;
			}
		}
		if($isthere == 1)
		{
			echo '<input checked type="checkbox" name="edition[]" value="'.$edition->EditionId.'"> '.$edition->EditionNumber.'<br>';
		}
		else
		{
			echo '<input type="checkbox" name="edition[]" value="'.$edition->EditionId.'"> '.$edition->EditionNumber.'<br>';
		}
	}


						echo'  <input type="submit" value="Submit">
						</form>';

?>



	</body>
	</html>
