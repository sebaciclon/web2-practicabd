<?php

require_once 'controllers/task.controllers.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$accion = $_GET['action'];

if($accion == '') {
    echo 'ERROR! ruta invalida';
} else {
    $parametros = explode('/' , $accion);

    //print_r($parametros);

    switch($parametros[0]) {
        case 'tareas': {        //muestro todas las tareas con la funcion mostrarTareas que tengo en la base de datos
            //instanciando un objeto de la clase TareasControladores
            $controller = new TaskControllers();
            $controller->showTask();
        break;
        }
        case 'nuevaTarea': {    //cargo una nueva tarea a la base de datos
            $controller = new TaskControllers();
            $controller->addTask();
        break;
        }
        case 'finalizar': {    //se llama igual que el href del boton
            $controller = new TaskControllers();
            $controller->finaliceTask($parametros[1]);
            
        break;
        }
        case 'ver': {    
            $controller = new TaskControllers();
            $controller->viewTask($parametros[1]);
        break;
        }
        default: {
            echo "Error";
        break;
        }
    }
}

?>