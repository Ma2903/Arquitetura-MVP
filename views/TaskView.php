<?php
class TaskView {
    private $presenter;

    public function setPresenter($presenter) {
        $this->presenter = $presenter;
    }

    public function displayTasks($tasks) {
        foreach ($tasks as $task) {
            echo "<li>$task</li>";
        }
    }

    public function addTask($task) {
        $this->presenter->addTask($task);
    }

    public function clearTasks() {
        $this->presenter->clearTasks();
    }
}
?>