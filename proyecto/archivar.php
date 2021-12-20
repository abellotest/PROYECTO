<?php
 echo "estas en archivos . php ";
 $id = $_GET['id'];

 require_once 'login.php';
 $conexion = new mysqli($hn, $un, $pw, $db);
 $query = "UPDATE tareas SET prioridad = 2 WHERE id = $id ;";
 $result = mysqli_query($conexion, $query);

 if(!$result){
    echo "no se archivo!";
}
else{
    header("Location: mostrar.php");
}

?>