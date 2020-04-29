<?php

class TaskView {

    public function showTasks($tareas) {

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
    
        echo '<h1> Lista de tareas</h1>';
        //armamos la lista de tareas
        echo "<ul>";
        foreach($tareas as $tarea) {
            $idTarea = $tarea->id_tareas;
            echo '<li>';
            echo '<a href="finalizar/'.$idTarea.'">Finalizar</a>';
            echo ' <b>' . $tarea->titulo . "</b> - ";
            echo $tarea->descripcion . "---";
            echo $tarea->prioridad . "---";
            echo '<a href="ver/'.$idTarea.'">Ver</a>';
        }
        echo "</ul>";
    
        echo '
            </body>
            </html>
        ';
    }

    function showTask($tarea) {

        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <base href="' . BASE_URL . '">
                <title>Tarea</title>
                <link rel="stylesheet" href="css/estilos.css">
            </head>
            <body>
        ';
    
        echo '<h1>Tarea</h1>';
        echo "<ul>";
            echo '<li>';
            echo ' <b>' . $tarea->titulo . "</b> - ";
            echo $tarea->descripcion . "---";
            echo $tarea->prioridad . "---";
            echo '<a href="'.BASE_URL.'tareas">Volver</a>';
            //echo '<a href="ver/'.$idTarea.'">Volver</a>';
            echo '</li>';
        echo "</ul>";
    
        echo '
            </body>
            </html>
        ';
    }

    //muestra error por pantalla
    public function showError($msg) {
        echo "<h2>ERROR</h2>";
        echo $msg;
    }

    
}

