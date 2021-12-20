<?php

require_once 'login.php';
$conexion = new mysqli($hn, $un, $pw, $db);   
ob_start();
session_start ();

if ( isset ( $_SESSION [ 'nombre' ]))
{
    $nombre = htmlspecialchars ( $_SESSION [ 'nombre' ]);
    $id_usuario = htmlspecialchars ( $_SESSION [ 'id_usuario' ]);

  echo "
<body>
    <div>
    <form action='insertar.php' method='post'>
        <table border='1'>
            <tr>
            <center>
                <h1>AGREGAR TAREAS</h1>
            
            
            TITULO <input type='text' name='titulo' id=''><br>
            CONTENIDO <textarea name='contenido' cols='32' rows='4' wrap='off'> </textarea><br>
            FECHA DE REGISTRO <input type='datetime-local' name='fecharegistro' id=''><br>
            FECHA DE VENCIMIENTO <input type='datetime-local' name='fechavencimiento' id=''><br>  
            <input type='hidden' name='id_usuario' value='$id_usuario'>
                <input type='submit' value='Guardar'>
                <a href='continue.php'>Cancelar</a>

                </center>
            </tr>
        </table>
    </form>
    </div>
</body>
";

}
 ?>
 