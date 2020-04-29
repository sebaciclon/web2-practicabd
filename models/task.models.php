<?php

class TaskModel {

    //crea la coneccion a la BBDD
    private function createConexion() {
        
        $host = 'localhost';
        $userName = "root";
        $password = '';
        $dataBase = 'db_tareas';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $userName, $password);
        } catch (Exception  $e){
            var_dump($e);
        }
        return $pdo;
    }

    //devuelve todas las tareas
    public function getAll() {

        // 1) abro la conexion con mysql
        $db = $this->createConexion();

        // 2)enviamos la consulta
        $sentencia = $db->prepare("SELECT * FROM tareas");    //preparo la sentencia
        $sentencia->execute();        //la ejecuto
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);    //Oobtenemos la lista de tareas y la guardamos en el arreglo $tareas

        return $tareas;
    }

    //devuelve una tarea
    public function get($idTarea) {
        // 1) abro la conexion con mysql
        $db = $this->createConexion();

        // 2)enviamos la consulta
        $sentencia = $db->prepare("SELECT * FROM tareas WHERE id_tareas = ?");    //preparo la sentencia
        $sentencia->execute([$idTarea]);        //la ejecuto
        $tareas = $sentencia->fetch(PDO::FETCH_OBJ);    //Oobtenemos la lista de tareas y la guardamos en el arreglo $tareas

        return $tareas;
    }

    function insert($titulo, $descripcion, $prioridad) {
        // 1) abro la conexion con mysql
        $db = $this->createConexion();
        // 2)enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad) VALUES (?, ?, ?) ");  //los ? son para verificar que el usuario no ingrese codigo malisioso
        $sentencia->execute([$titulo, $descripcion, $prioridad]);        //la ejecuto
    }

    function finalize($idTarea) {
        // 1) abro la conexion con mysql
        $db = $this->createConexion();
        // 2)enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM tareas WHERE id_tareas = ?");  //los ? son para verificar que el usuario no ingrese codigo malisioso
        $sentencia->execute([$idTarea]);        //la ejecuto
    
    }
}