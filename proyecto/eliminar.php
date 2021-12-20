<?php

$id = $_GET['id'];

require_once 'login.php';
$conexion = new mysqli($hn, $un, $pw, $db);
$query = "DELETE FROM tareas WHERE id like $id";
$result = mysqli_query($conexion, $query);
if(!$result){
    echo "no se eliminó!";
}
else{
    header("Location: mostrar.php");
}
?>