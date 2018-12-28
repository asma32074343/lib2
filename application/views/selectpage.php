<?php
defined('BASEPATH') OR exit('No direct script access allowed');

isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>user </title>


</head>
<body>

<div><h1><mark>welcome</mark></h1></div>
<div><p>here you can reserch for the item that you want</p></div>
<a href="<?php echo base_url();?>index.php/user/reserch">reserch</a>
<div><p>here you can see all the item</p></div>
<a href="<?php echo base_url();?>index.php/user/showallitem">all_the_contant</a>

</body>
</html>
