<?php 
$conexion=mysqli_connect("localhost", "root", "","db_music");
$instrumento = $_POST['instrumento'];
$genero = $_POST['genero'];
$sqlInstrumento = "SELECT id FROM instrumentos where instrumentos.nombre ="'.$instrumento.'"";
$sqlInstrumento2 ="SELECT * FROM instru_user where instru_user.id_instrumento="'.$sqlInstrumento.'"";

$arreglo =[];

$ejecutar= $conexion->query($sql);

if($ejecutar) {
   

while($row =mysqli_fetch_assoc($ejecutar)) {
    $subArreglo = array(
    //"id" => $row["id"],
    //"nombre" => $row["nombre"],
    "latitud" => $row["latitud"],
    "longitud" => $row["longitud"]
    );
    array_push($arreglo, $subArreglo);
}

$js_array = json_encode($arreglo);
echo $js_array;
}
?>