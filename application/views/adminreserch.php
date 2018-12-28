<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>reserch</title>


</head>
<body>

<div><h1><mark>reserch for you ietms by title</mark></h1></div>
<form action="<?php echo base_url(); ?>index.php/admin/reserchtitleadmin" method="post">
 item title: <input type=""pe="text" name="itemtitle"><br>
 <input type="submit" value="reserch">
</form>

<div><h1><mark>reserch for you ietms by auter</mark></h1></div>
<form action="<?php echo base_url(); ?>index.php/admin/reserchautheradmin" method="post">
 AutherName: <input type=""pe="text" name="AutherName"><br>
 <input type="submit" value="reserch">
</form>

<div><h1><mark>reserch for you ietms by gener</mark></h1></div>
<form action="<?php echo base_url(); ?>index.php/admin/reserchgenreadmin" method="post">
 gener: <input type=""pe="text" name="genre"><br>
 <input type="submit" value="reserch">
</form>

</body>
</html>
