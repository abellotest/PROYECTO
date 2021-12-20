<?php 
date_default_timezone_set("America/Lima");
ob_start();
session_start ();

if ( isset ( $_SESSION [ 'nombre' ]))
{
    $nombre = htmlspecialchars ( $_SESSION [ 'nombre' ]);
    $apellido = htmlspecialchars ( $_SESSION [ 'apellido' ]);
    $id_usuario = htmlspecialchars ( $_SESSION [ 'id_usuario' ]);

echo <<<_END

        <form  method="post">
        
        <select name="opcion" border="6">
        <option value="pendientes">pendientes</options>
        <option value="archivadas">archivadas</options>
        <option value="vencidas">vencidas</options>
        <option value="todas">todas</options>
        </select>
        <input type="submit" value="ver">
        <a href="continue.php">Volver</a><br>

        <center>
        <div>
        <table border="5">
        <tr>
        <td>Titulo</td>
        <td>Contenido</td>
        <td>Fecha de Registro</td>
        <td>Fecha de Vencimiento</td>
       
    
        </tr>
        </center>
        </form>
        <div>

_END;
        
        if(isset($_POST["opcion"])){

            $opcion=$_POST["opcion"];

         switch($opcion){
            
            case 'pendientes':
                require_once 'login.php';
                $conexion = new mysqli($hn, $un, $pw, $db);
                $query = "SELECT * FROM tareas where prioridad=1 && id_usuario=$id_usuario order by fechavencimiento asc";
                $result = $conexion->query($query);   
               
                    $rows = $result->num_rows;
                    for ($j = 0; $j < $rows; ++$j)
                    {
                    $row = $result->fetch_array(MYSQLI_NUM); 
   
                    echo <<<_END

                    <tr>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>

                    <a href="eliminar.php? id=$row[0]">eliminar</a> 
                    <a href="archivar.php? id=$row[0]">archivar</a>

                    <a href="editar.php?
    
                    id=$row[0]&
                    titulo=$row[1]&
                    contenido=$row[2]&
                    fecharegistro=$row[3]&
                    fechavencimiento=$row[4]&
                    prioridad=$row[5]& ">editar</a>
                    </td>
                    </tr>                         
_END;
                    }
            break;

            case 'archivadas':
                require_once 'login.php';
                $conexion = new mysqli($hn, $un, $pw, $db);
                $query = "SELECT * FROM tareas where prioridad=2 && id_usuario= $id_usuario order by fechavencimiento asc";
                $result = mysqli_query($conexion, $query); 
                    while ($row = mysqli_fetch_row($result)) {

                    echo <<<_END
                    <tr>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
        
                    <td>
                    <a href="eliminar.php? id=$row[0]">eliminar</a>

                    <a href="editar.php?
                    id=$row[0]&
                    titulo=$row[1]&
                    contenido=$row[2]&
                    fecharegistro=$row[3]&
                    fechavencimiento=$row[4]&
                    prioridad=$row[5]& ">editar</a>
                    </td>
                    </tr>    
_END;
                    }
    
            break;

            case 'vencidas':
                    
                require_once 'login.php';
                $conexion = new mysqli($hn, $un, $pw, $db);
                $query = "SELECT * FROM tareas where prioridad=1  && id_usuario= $id_usuario order by fechavencimiento asc";
                $result = $conexion->query($query);   
               
                    $rows = $result->num_rows;
                    for ($j = 0; $j < $rows; ++$j){
                       
                    $row = $result->fetch_array(MYSQLI_NUM); 
                    $fechaactual= date('Y-m-d H:i:s');  
                    $mostrar = htmlspecialchars($row[4]);
                    
                    if ($mostrar <= $fechaactual ) {  

                    echo <<<_END

                    
                        
                        <tr>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        </tr>

_END;
                    } 
                 }
            break;

            case 'todas':
                require_once 'login.php';
                $conexion = new mysqli($hn, $un, $pw, $db);
                $query = "SELECT * FROM tareas WHERE id_usuario=$id_usuario order by fechavencimiento asc";
                $result = mysqli_query($conexion, $query); 
                    while ($row = mysqli_fetch_row($result)) {
                    echo <<<_END
                    <tr>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
        
                    <td>
                    <a href="eliminar.php? id=$row[0]">eliminar</a>
            
                    <a href="editar.php?
                    id=$row[0]&
                    titulo=$row[1]&
                    contenido=$row[2]&
                    fecharegistro=$row[3]&
                    fechavencimiento=$row[4]&
                    prioridad=$row[5]& ">editar</a>
                    </td>
                    </tr>                    
_END;
                    }
            break;

            default:
                echo "no se encontro la prioridad";
            break;  
         }   
             
            echo "$opcion";
    }
}
    else  
    echo  " <a href=signin.php> </a>";  
?>
 </table>
         