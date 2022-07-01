<?php

class TaskView extends Task{
    public function showTodoTasks($userid){
        $results = $this->getTodoTasks($userid);
        foreach($results as $task){
            $id = $task['id'];
            $title = $task['t_name'];
            $desc = $task['t_desc'];
            $date = $task['t_date'];
            echo "<div class='card'>
            <h2 class='card-title'>$title</h2>
            <p class='card-description'>$desc</p>
            <div class=card-footer>
                <span class='card-date'>$date</span>
                <form action='includes/process-form.php'>
                    <button class='delete-btn' name='delete' value='$id'>Delete</button>
                    <button class='done-btn' name='done' value='$id'>Done</button>
                </form>
            </div>
        </div>";
        }
    }
    public function showDoneTasks($userid){
        $results = $this->getDoneTasks($userid);
        foreach($results as $task){
            $id = $task['id'];
            $title = $task['t_name'];
            $desc = $task['t_desc'];
            $date = $task['t_date'];
            echo "<div class='card'>
            <h2 class='card-title'>$title</h2>
            <p class='card-description'>$desc</p>
            <div class=card-footer>
                <span class='card-date'>$date</span>
                <form action='includes/process-form.php'>
                    <button class='delete-btn' name='delete' value='$id'>Delete</button>
                </form>
            </div>
        </div>";
        }
    }
}