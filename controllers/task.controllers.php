<?php

require_once 'models/task.models.php';
require_once 'views/task.view.php';

class TaskControllers {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function showTask() {
        //pido las tareas al modelo
        $task = $this->model->getAll();

        //actualizo la vista
        $this->view->showTasks($task);
    }

    public function viewTask($idTarea) {
        $task = $this->model->get($idTarea);

        if(!empty($task))
            $this->view->showTask($task);
        else
            $this->view->showError("La tarea no existe");
    }

    public function addTask() {
        
        if(empty($_POST['titulo']) || empty($_POST['descripcion']) || empty($_POST['prioridad'])) {
            $this->view->showError("No ingreso todos los datos");
        } else {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];
        
            $this->model->insert($titulo, $descripcion, $prioridad);
            //con esta linea le indico a donde se redirecciona despues de cargar la tarea
            //en este caso que se quede en el formulario
            header('location: ' . BASE_URL . "tareas");
        }
    }

    public function finaliceTask($idTarea) {
        $this->model->finalize($idTarea);
        header('location: ' . BASE_URL . "tareas");
    }



}




?>