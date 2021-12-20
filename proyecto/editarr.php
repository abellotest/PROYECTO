<?php

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecharegistro = $_POST['fecharegistro'];
$fechavencimiento = $_POST['fechavencimiento'];
$prioridad = $_get['prioridad'];
$id_usuario= $_POST['id_usuario'];


require_once 'login.php';
$conexion = new mysqli($hn, $un, $pw, $db);
$query = "UPDATE tareas set titulo='$titulo', contenido='$contenido',fecharegistro='$fecharegistro' ,
fechavencimiento='$fechavencimiento'  WHERE id like $id";
$result = mysqli_query($conexion, $query);
if(!$result){
   
    echo "no se actualizó!";
}
else{
    header("Location: mostrar.php");

   
}
