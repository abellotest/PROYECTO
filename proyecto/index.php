<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);

    if($conexion->connect_error) die("Error fatal");
    ob_start();
    session_start();
    if(isset($_SESSION['nombre'])){
      header('Location: continue.php');
    }
session_destroy();

    if (isset($_POST['username'])&&
        isset($_POST['password']))
    {
        $un_temp = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);
        $query   = "SELECT * FROM usuarioss WHERE username='$un_temp'";
        $result  = $conexion->query($query);
        
        if (!$result) die ("Usuario no encontrado");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();

            if (password_verify($pw_temp, $row[4])) 
            {
                session_start();
                $_SESSION['nombre']=$row[1];
                $_SESSION['apellido']=$row[2];
                $_SESSION['id_usuario']=$row[0];
                echo htmlspecialchars("$row[1] $row[2]:
                    hola $row[1], has ingresado como '$row[3]'");
                die ("<p><a href='continue.php'>
              Click para continuar</a></p>");
            }
            else {
                echo "Aún no se registro <p><a href='signup.php'>
            Registrarse</a></p>";
            }
        }
        else {
          echo "Usuario/password incorrecto <p><a href='index.php'>
      Registrese</a></p>";
      }   
    }
    else
    {
      echo <<<_END
      <center>
      <h1>Iniciar sesion</h1>
      <form action="index.php" method="post"><pre>
      Usuario  <input type="text" name="username">
      Password <input type="password" name="password">
               <input type="submit" value="INGRESAR">
      <a href='signup.php'> Registrarse</a>
      </form>
      </center>
_END;
    }
    

    $conexion->close();

    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
       // if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }  
?>