
<?php
$id = $_GET['id'];
$titulo = $_GET['titulo'];
$contenido = $_GET['contenido'];
$fecharegistro = $_GET['fecharegistro'];
$fechavencimiento = $_GET['fechavencimiento'];
$prioridad = $_GET['prioridad'];
//$id_usuario = $_GET['id_usuario'];

echo "
  
    <div>
    <center>
    <h1>EDITE SU TAREA</h1>
    <form action='editarr.php' method='post'>
        <table>
            <tr>
            
            
        <input type='text' name='id' id='' style='visibility:hidden' value='$id'><br>
         TITULO <input type='text' name='titulo' id='' value='$titulo'><br>
         CONTENIDO <input type='text' name='contenido' id='' value='$contenido'><br>
         FECHA DE REGISTRO <input type='datetime-local' name='fecharegistro' id='' value='$fecharegistro'><br>
         FECHA DE VENCIMIENTO <input type='datetime-local' name='fechavencimiento' id='' value='$fechavencimiento'><br>  
        
         </tr>     
        
            
            <tr>
                <td><input type='submit' value='Actualizar'></td>
                <td><a href='mostrar.php'>Cancelar</a></td>
            </tr>
        </table>

    </form>
    </center>
    </div>
    ";
    ?>