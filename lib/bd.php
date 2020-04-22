<?php

//conexion a la base de datos y hacer la consulta
    function conexionBD() {

        // 1) abro la conexion con mysql
        $db = new PDO('mysql:host=localhost;'.'dbname=db_tareas;charset=utf8', 'root', '');

        // 2)enviamos la consulta
        $sentencia = $db->prepare("SELECT * FROM tareas");    //preparo la sentencia
        $sentencia->execute();        //la ejecuto
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);    //Oobtenemos la lista de tareas y la guardamos en el arreglo $tareas

        return $tareas;
    }

    function insertarTarea($titulo, $descripcion, $prioridad) {
        // 1) abro la conexion con mysql
        $db = new PDO('mysql:host=localhost;'.'dbname=db_tareas;charset=utf8', 'root', '');

        // 2)enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad) VALUES (?, ?, ?) ");  //los ? son para verificar que el usuario no ingrese codigo malisioso
        $sentencia->execute([$titulo, $descripcion, $prioridad]);        //la ejecuto
    }