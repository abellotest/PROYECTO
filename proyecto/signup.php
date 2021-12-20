<?php //signup.php
    ob_start();
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $nombre = mysql_entities_fix_string($conexion, $_POST['nombre']);
        $apellido = mysql_entities_fix_string($conexion, $_POST['apellido']);
        $username = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);

        $password = password_hash($pw_temp, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarioss
            VALUES(null,'$nombre','$apellido','$username', '$password')";

        $result = $conexion->query($query);
        if (!$result) die ("Falló registro , usteded ya se registro
        <a href='signup.php'><br>Registrese</a>");

        echo "Registro exitoso 
        echo <br>
        <a href='index.php'>Ingresar</a>";
        
    }
    else
    {
        echo "
        <center>
        <h1>Regístrate</h1>
        <form action='signup.php' method='post'><pre>
        Nombre  <input type='text' name='nombre' id_usuario=''>
        Apellido  <input type='text' name='apellido' id_usuario=''>
        Usuario  <input type='text' name='username' id_usuario=''>
        Password <input type='text' name='password' id_usuario=''>
                 <input type='hidden' name='reg' value='yes'>
                 <input type='submit' value='REGISTRAR'>
                 <a href='index.php'>Volver</a>
        </form>
        </center>  
        ";
      

       
    }
    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
      //  if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }   
?>