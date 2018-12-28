<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
isset($_SESSION['isuserloggedin']) OR exit('please login');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welsome to our library</title>


</head>
<body>

<div><h1><mark>you are admin </mark></h1></div>
<br>
<div>if you want to add item,auther,genre and edition clic here</div>
<br>
<a href="<?php echo base_url();?>index.php/admin/add_item">additem</a>
<a href="<?php echo base_url();?>index.php/user/add_auther">addauther</a>
<a href="<?php echo base_url();?>index.php/admin/add_genre">addgenre</a>
<a href="<?php echo base_url();?>index.php/admin/add_edition">addEdition</a>
<br><br><br>
<div>if tou want to do reserch,update and delate clic here<div>
<a href="<?php echo base_url();?>index.php/admin/reserch">reserch</a>
  <br><br><br>
  <div>if you want see all the contant for the library</div>
<a href="<?php echo base_url();?>index.php/user/showallitem">all_the_contant</a>
</body>
</html>
