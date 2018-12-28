<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welsome to our library</title>


</head>
<body>

<div><h1><mark>welcome to our library</mark></h1></div>

<a href="<?php echo base_url();?>index.php/admin/index">admin</a>
<br>
<a href="<?php echo base_url();?>index.php/user/userchoise">user</a>
</body>
</html>
