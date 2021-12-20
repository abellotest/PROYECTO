<?php
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecharegistro = $_POST['fecharegistro'];
$fechavencimiento = $_POST['fechavencimiento'];
$id_usuario = $_POST['id_usuario'];

require_once 'login.php';
$conexion = new mysqli($hn, $un, $pw, $db);
$query = "INSERT INTO tareas value"."(null,'$titulo', '$contenido','$fecharegistro','$fechavencimiento','1','$id_usuario')";
$result = mysqli_query($conexion, $query);
if (!$result){
    echo "no se inserto!";
}
else{
    header("Location:continue.php");
}

?>