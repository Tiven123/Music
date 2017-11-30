<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
       <style>
       	.row{
       		margin: 1%;
       		display: inline-block;
       		width: 200px;
       		height: 250px;
       	}
       	.row div{
       		width: 100%;
       	}
       	.modal-header{
       		border:none;
       	}
       	
       	.modal-header div{
       		height: 56px;
       		width: 56px;
       		float: left;	
       		border-radius: 100%;
       		overflow:hidden;
       	}

       	.modal-header div img{
       		height: 100%;
       	}

       	.modal-header h4{
			margin-top: 2.2%;
			margin-left: 11%;
       	}

       	.btn-success,.btn-primary{
       		margin: 1%;
       	}


       </style>
</head>
<body>

<form action="<?php echo site_url('index.php/Busqueda/obtenerInstrumento'); ?>" method="post">
<select class="selectpicker" title="Choose one of the following..." name="menu1">
 <?php foreach($instrumentos as $row){?>
  	<option value="<?=  $row->id?>"><?=  $row->nombre; ?></option>	
   <?php } ?>
</select>
<button type="submit" class="btn btn-default" id="buscar1">Buscar</button>
</form>
<form action="<?php echo site_url('index.php/Busqueda/obtenerGenders'); ?>" method="post">
<select class="selectpicker" id="generos" title="Choose one of the following..." name="menu2">
  <?php foreach ($generos as $key => $value) {?>
  	<option value="<?php echo $value->id?>"><?php echo $value->nombre; ?></option>	
   <?php } ?>
</select>
<button type="submit" class="btn btn-default" id="buscar2">Buscar</button>
</form>

<?php 
if (isset($usuarios)) { // <= true
	foreach ($usuarios as $key => $value) {
		echo "
			<div class='row'>
			  <div class='container'>
			    <div class='thumbnail'>
			     <img src='";echo base_url();echo"application/upload/";echo $value[0]['photo']; echo"'>
			      <div class='caption'>
			        <h3>";echo $value[0]['name']; echo"</h3>
			        <p><a href='#' class='btn btn-primary' role='button' data-toggle='modal' data-target='#";echo $value[0]['id']; echo"'>Ver Perfil</a></p>
			      </div>
			    </div>
			  </div>
			</div>


<div class='modal fade' id='";echo $value[0]['id']; echo"' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <div><img src='";echo base_url();echo"application/upload/";echo $value[0]['photo']; echo"'></div>
        <h4 class='modal-title' id='myModalLabel'>";echo $value[0]['name']; echo"</h4>
      </div>
      <div class='modal-body'>
      <h4>Datos</h4>
		<!--Table-->
<table class='table'>

    <!--Table head-->
    <thead class='blue-grey lighten-4'>
        <tr>
        	<th>#</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr>
            <th scope='row'>1</th>
            <td>";echo $value[0]['address']; echo"</td>
            <td>";echo $value[0]['email']; echo"</td>
            <td>";echo $value[0]['username']; echo"</td>
        </tr>
    </tbody>
    <!--Table body-->
</table>
<!--Table-->
	<h4>Instrumentos</h4>";

	foreach ($artefactos as $key => $value2) {
		if($value[0]['id']==$value2->id){
			echo "<button type='button' class='btn btn-success'>";echo $value2->nombre; echo"</button>";
		}
	}

echo "<h4>Generos</h4>";

	foreach ($tipos_generos as $key => $value2) {
		if($value[0]['id']==$value2->id){
			echo "<button type='button' class='btn btn-primary'>"; echo $value2->nombre; echo"</button>";
		}
	}


 echo"
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
 		";
	}


}
?>

<?php 
if (isset($search_genders)) { // <= true
	foreach ($search_genders as $key => $value) {
		echo "
			<div class='row'>
			  <div class='container'>
			    <div class='thumbnail'>
			      <img src='";echo $value[0]['photo']; echo"' alt='...'>
			      <div class='caption'>
			        <h3>";echo $value[0]['name']; echo"</h3>
			        <p><a href='#' class='btn btn-primary' role='button' data-toggle='modal' data-target='#";echo $value[0]['id']; echo"'>Ver Perfil</a></p>
			      </div>
			    </div>
			  </div>
			</div>


<div class='modal fade' id='";echo $value[0]['id']; echo"' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <div><img src='code/application/upload/";echo $value[0]['photo']; echo"'></div>
        <h4 class='modal-title' id='myModalLabel'>";echo $value[0]['name']; echo"</h4>
      </div>
      <div class='modal-body'>
      <h4>Datos</h4>
		<!--Table-->
<table class='table'>

    <!--Table head-->
    <thead class='blue-grey lighten-4'>
        <tr>
        	<th>#</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr>
            <th scope='row'>1</th>
            <td>";echo $value[0]['address']; echo"</td>
            <td>";echo $value[0]['email']; echo"</td>
            <td>";echo $value[0]['username']; echo"</td>
        </tr>
    </tbody>
    <!--Table body-->
</table>
<!--Table-->
	<h4>Instrumentos</h4>";

	foreach ($artefactos as $key => $value2) {
		if($value[0]['id']==$value2->id){
			echo "<button type='button' class='btn btn-success'>";echo $value2->nombre; echo"</button>";
		}
	}

echo "<h4>Generos</h4>";

	foreach ($tipos_generos as $key => $value2) {
		if($value[0]['id']==$value2->id){
			echo "<button type='button' class='btn btn-primary'>"; echo $value2->nombre; echo"</button>";
		}
	}


 echo"
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
 		";
	}
}
?>



</body>
</html>