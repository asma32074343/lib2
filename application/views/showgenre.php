<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<meta charset="utf-8">
	<title>reserch</title>


</head>
<body>
<a href="<?php echo base_url();?>index.php/user/logout">logout</a>

	<div class="divTable">
	<div class="divTableHeading">
	<div class="divTableRow">

    <div class="divTableHead">ItemTitle</div>
    <div class="divTableHead">NumberPage</div>
    <div class="divTableHead">bestcollection</div>
    <div class="divTableHead">EditionNumber</div>
    <div class="divTableHead">PrintDay</div>
    <div class="divTableHead">DateofPublishing</div>
    <div class="divTableHead">isbnNumber</div>

    <div class="divTableHead">GenerType</div>
        <div class="divTableHead">FormType</div>
          <div class="divTableHead">AutherName</div>
	</div>
	</div>
	<div class="divTableBody">

    <?php
    // print_r($searchresult);
    foreach  ($searchresult as $c) {

              echo '<div class="divTableRow">';

              echo '<div class="divTableCell">'.$c->ItemTitle.'</div>';
              echo '<div class="divTableCell">'.$c->NumberPage.'</div>';
              echo '<div class="divTableCell">'.$c->bestcollection.'</div>';
              echo'<div class="divTableCell">'.$c->EditionNumber.'</div>';
              echo '<div class="divTableCell">'.$c->PrintDay.'</div>';
              echo '<div class="divTableCell">'.$c->DateofPublishing.'</div>';
              echo'<div class="divTableCell">'.$c->isbnNumber.'</div>';
              echo '<div class="divTableCell">'.$c->GenerType.'</div>';
              echo '<div class="divTableCell">'.$c->FormType.'</div>';
             echo '<div class="divTableCell">'.$c->AutherName.'</div>';
              echo '</div>';
    }


?>
</body>
</html>
