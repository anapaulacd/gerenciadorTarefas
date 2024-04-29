<?php
session_start();
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}
if (isset($_GET['task_name'])) {
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}
if (isset($_GET['clear'])) {
    unset($_SESSION['tasks']);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Gerenciador de Tarefas</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel="stylesheet" href="gt.css">
<script src='main.js'></script>
</head>
<body>
<div class="container">
<div class="header">
<h1>Gerenciador de tarefas</h1>
</div>
<div class="form">
<form action="" method="get">
<label for="task_name">tarefa: </label>
<input type="text" name="task_name" placeholder="Nome da tarefa">
<button type="submit">cadastrar</button>
</form>
</div>
<div class="separator"></div>
<div class="list-tasks">
<ul>
<?php
            if (isset($_SESSION['tasks'])) {
                foreach ($_SESSION['tasks'] as $key => $task) {
                    echo "<li>$task</li>";
                }
            }
            ?>
</ul>
</div>
<form action="" method="get">
<input type="hidden" name="clear" value="clear">
<button type="submit" class="btn-clear">Limpar tarefas</button>
</form>
<div class="footer">
<p>Desenvolvido por @nomedev</p>
</div>
</div>
</body>
</html>