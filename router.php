<?php

require_once 'lib/tareas.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$accion = $_GET['action'];

if($accion == '') {
    echo 'ERROR! ruta invalida';
} else {
    $parametros = explode('/' , $accion);

    //print_r($parametros);

    switch($parametros[0]) {
        case 'tareas': {        //muestro todas las tareas con la funcion mostrarTareas que tengo en la base de datos
            mostrarTareas();
        break;
        }
        case 'nuevaTarea': {    //cargo una nueva tarea a la base de datos
            agregarTarea();
        break;
        }
        case 'finalizar': {    //se llama igual que el href del boton
            finalizarTarea($parametros[1]);
            
        break;
        }
        case 'ver': {    
            verTarea($parametros[1]);
            
        break;
        }
        default: {
            echo "Error";
        break;
        }
    }
}

?>