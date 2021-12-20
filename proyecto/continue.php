<?php  //continue.php
   ob_start();
    session_start ();

    if ( isset ( $_SESSION [ 'nombre' ]))
    {
        $nombre = htmlspecialchars ( $_SESSION [ 'nombre' ]);
        $apellido = htmlspecialchars ( $_SESSION [ 'apellido' ]);
        $id_usuario = htmlspecialchars ( $_SESSION [ 'id_usuario' ]);

        

        echo   " <center> <h1> BIENVENIDO A SU AULA </h1> <br>
               <a href=nuevo.php> Agregar tarea </a><br>
               <a href=mostrar.php> Listar tarea </a><br>


               <a href=logout.php> Cerrar sesión </a> </center> " ;
    }
    else  echo  " <a href=index.php> </a>";
                 
?>