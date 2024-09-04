<?php
class TaskPresenter {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
        $this->view->setPresenter($this);

        // Carregar tarefas da sessão, se existirem
        if (isset($_SESSION['tasks']) && is_array($_SESSION['tasks'])) {
            foreach ($_SESSION['tasks'] as $task) {
                $this->model->addTask($task); // Adiciona cada tarefa armazenada na sessão
            }
        }
    }

    public function addTask($task) {
        // Verifica se a tarefa já existe
        $tasks = $this->model->getTasks();
        if (in_array($task, $tasks)) {
            return; // A tarefa já existe, não adiciona novamente
        }

        $this->model->addTask($task);
        $this->saveTasks(); // Salva tarefas na sessão
    }

    public function clearTasks() {
        $this->model->clearTasks();
        $this->saveTasks(); // Limpa as tarefas da sessão
    }

    private function saveTasks() {
        $_SESSION['tasks'] = $this->model->getTasks();
    }

    public function getTasks() {
        return $this->model->getTasks();
    }
}
?>