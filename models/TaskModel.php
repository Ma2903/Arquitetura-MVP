<?php
class TaskModel {
    private $tasks = [];

    public function addTask($task) {
        // Cria um ID único para cada tarefa
        $id = uniqid();
        $this->tasks[$id] = $task; // Armazena a tarefa com um ID único
    }

    public function getTasks() {
        return $this->tasks;
    }

    public function clearTasks() {
        $this->tasks = []; // Limpa todas as tarefas
    }
}
?>