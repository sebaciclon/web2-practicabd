<?php

require_once 'lib/bd.php';

function mostrarTareas() {

    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <base href="' . BASE_URL . '">
            <title>Lista de Tareas</title>
            <link rel="stylesheet" href="css/estilos.css">
        </head>
        <body>
    
            <form action="nuevaTarea" method="POST">
                <label>Titulo</label>
                <input type="text" name="titulo">
                <label>Descripcion</label>
                <textarea name="descripcion"></textarea>
                <label>Prioridad</label>
                <select name="prioridad">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <button type="submit">Guardar</button>
            </form>

    ';

    //obtengo las tareas
    $tareas = conexionBD();
    //print_r($tareas);

    echo '<h1> Lista de tareas</h1>';
    //armamos la lista de tareas
    echo "<ul>";
    foreach($tareas as $tarea) {
        echo "<li><b>" . $tarea->titulo . "</b> - " . $tarea->descripcion . "</li>";
    }
    
    echo "</ul>";

    echo '
        </body>
        </html>
    ';
}

function agregarTarea() {

    if(empty($_POST['titulo']) || empty($_POST['descripcion']) || empty($_POST['prioridad'])) {
        echo "No ingreso todos los datos";
        die();
        //die: para que termine la ejecucion del programa
    } else {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $prioridad = $_POST['prioridad'];

        insertarTarea($titulo, $descripcion, $prioridad);
        //con esta linea le indico a donde se redirecciona despues de cargar la tarea
        //en este caso que se quede en el formulario
        header('location: tareas');
        
    }
    
    
}


?>