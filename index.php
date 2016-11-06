<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulário</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<style>
		.toggle-light .toggle-slide{height: 35px;}
	</style>
</head>
<body>
	<?php
		require "autoload.php"; 
		$formExample = new FormExample();  
		echo $formExample->getElements();
	?>	
</body>
</html>
