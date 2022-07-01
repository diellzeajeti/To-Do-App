<?php 
include "classes/dbConfig.class.php";
include "classes/task.class.php";
include "classes/task-view.class.php";

session_start();
if(!isset($_SESSION['userid'])){
    header("Location: index.php");
    die();
}
$userid = $_SESSION['userid'];
$username = $_SESSION['useruid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <button class="add-task show-modal">Add+</button>
        <h1>Username:  <?php echo $username; ?></h1> 
        <form action="includes/process-form.php">
        <button class="logout" name="logout">Log out</button>
        </form>
    </header>
    <main>
        <div class="to-do wrapper">
                <h1>To Do</h1>
                    <?php $result = new TaskView;
                            $result->showTodoTasks($userid);
                    ?> 
                        
                </div>

        <div class="done wrapper">
                <h1>Done</h1>
                <?php
                $result->showDoneTasks($userid);
                ?>
        </div>
        
        <div class="modal hidden">
            <button class="close-modal">&times</button>
            <h1>Create task</h1>
            <form action="includes/process-form.php">
                <label for="t-name">Task name:</label>
                <input type="text" placeholder="Task name here..." id="t-name" name="t-name">
                <label for="t-desc">Task description:</label>
                <textarea name="t-desc" id="t-desc" cols="30" rows="10" placeholder="Task description here..."></textarea>
                <label for="t-date">Task deadline:</label>
                <input type="datetime-local" id="t-date" name="t-date">
                <button type="submit" name="t-btn">Add Task</button>
            </form>
        </div>
        <div class="overlay hidden"></div>
    </main>

    <script src="js/modal.js"></script>
</body>
</html>