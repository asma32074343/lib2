<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>user </title>


</head>
<body>

<div><h1><mark>welcome</mark></h1></div>
<div><p>if you are member longin please</p></div>
<a href="<?php echo base_url();?>index.php/admin/userlogin">userlogin</a>
<div><p>if you don't have acount creat one please</p></div>
<a href="<?php echo base_url();?>index.php/admin/add_user">creatcount</a>

</body>
</html>
