<?php

    function crearConexion() {
        $host = 'localhost';
        $userName = "root";
        $password = '';
        $dataBase = 'db_tareas';

        $pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $userName, $password);

        return $pdo;
    }

//conexion a la base de datos y hacer la consulta
    function conexionBD() {

        // 1) abro la conexion con mysql
        $db = crearConexion();

        // 2)enviamos la consulta
        $sentencia = $db->prepare("SELECT * FROM tareas");    //preparo la sentencia
        $sentencia->execute();        //la ejecuto
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);    //Oobtenemos la lista de tareas y la guardamos en el arreglo $tareas

        return $tareas;
    }

    function insertarTarea($titulo, $descripcion, $prioridad) {
        // 1) abro la conexion con mysql
        $db = crearConexion();
        // 2)enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad) VALUES (?, ?, ?) ");  //los ? son para verificar que el usuario no ingrese codigo malisioso
        $sentencia->execute([$titulo, $descripcion, $prioridad]);        //la ejecuto
    }

    function borrarTarea($idTarea) {
        // 1) abro la conexion con mysql
        $db = crearConexion();
        // 2)enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM tareas WHERE id_tareas = ?");  //los ? son para verificar que el usuario no ingrese codigo malisioso
        $sentencia->execute([$idTarea]);        //la ejecuto
    
    }

    function obtenerTarea($idTarea) {
        // 1) abro la conexion con mysql
        $db = crearConexion();

        // 2)enviamos la consulta
        $sentencia = $db->prepare("SELECT * FROM tareas WHERE id_tareas = ?");    //preparo la sentencia
        $sentencia->execute([$idTarea]);        //la ejecuto
        $tareas = $sentencia->fetch(PDO::FETCH_OBJ);    //Oobtenemos la lista de tareas y la guardamos en el arreglo $tareas

        return $tareas;
    }