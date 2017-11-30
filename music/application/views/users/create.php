<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;

	}

	input{
 

	}
	</style>

	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
<div id="container">
	<h1>Register!</h1>
	<div id="body">
		<p>Please fill all the information below </p>
		<div class="error"> <?php echo $this->session->flashdata('message'); ?>
    </div>
	
    <form class="" action="<?php echo site_url('usuario/salvar'); ?>" method="post" enctype="multipart/form-data">
       
	     Name: <input type="text" name="name" value="">
         Address: <input type="text" name="address" value="">
	     Email: <input type="text" name="email" value="">
		 <br><br>
	     Photo: <input type="file" name="userfile" value="" >
		 <br><br>
		 Username: <input type="text" name="username" value="">
	     Password: <input type="pass" name="password" value="">
		 <br><br>
	<select class="selectpicker" multiple   name="instrumentos[]" id="hola" >
    <?php foreach($instruments as $instrument): ?>  
    <option value"<?= $instrument->id?>"><?= $instrument->nombre?></option>
  <?php endforeach; ?>
</select>
<br>
<br>
<select class="selectpicker" multiple name="generos[]">
    <?php foreach($generos as $genero): ?>  
    <option value"<?= $genero->id?>"><?= $genero->nombre?></option>
  <?php endforeach; ?>
</select>

      <input class="btn btn-success" type="submit" value="Save">
	  <br>
<br>
    </form>
	</div>
	</div>
	</div>
</div>

</body>
</html>
