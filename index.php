<?php
session_start(); // Inicializa a sessão

// Incluindo os arquivos das classes
require_once 'models/TaskModel.php';
require_once 'views/TaskView.php';
require_once 'presenters/TaskPresenter.php';

// Instanciando os componentes do MVP
$model = new TaskModel();
$view = new TaskView();
$presenter = new TaskPresenter($model, $view);

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['new_task'])) {
        $presenter->addTask($_POST['new_task']); // Usando o presenter para adicionar a tarefa
    } elseif (isset($_POST['clear_tasks'])) {
        $presenter->clearTasks(); // Usando o presenter para limpar todas as tarefas
    }
}

// Obtendo as tarefas para exibição
$tasks = $presenter->getTasks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tarefas MVP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h2>Adicionar Nova Tarefa</h2>
        <form method="post" action="">
            <input type="text" name="new_task" required>
            <button type="submit">Adicionar</button>
        </form>

        <h2>Lista de Tarefas:</h2>
        <ul>
            <?php
            // Exibe as tarefas já adicionadas
            $view->displayTasks($model->getTasks());
            ?>
        </ul>

        <form method="post" action="">
            <button class="clear-btn" type="submit" name="clear_tasks">Limpar Tarefas</button>
        </form>
    </div>
</body>
</html>