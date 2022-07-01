<?php

class Task extends DbConfig{
    protected function setTask($t_name, $t_desc, $t_date,$t_user){
        $stmt = $this->connect()->prepare('INSERT INTO tasks(t_name, t_desc, t_date,user_id) VALUES (?, ?, ?, ?);');
    
        if(!$stmt->execute(array($t_name, $t_desc, $t_date,$t_user))){
            $stmt = null;
            header("Location: ../todo.php?error=stmtfailed");
            exit();
        }
    }

    protected function getTodoTasks($user_id){
        $stmt = $this->connect()->prepare('SELECT * FROM tasks WHERE user_id = ? AND done = 0 ORDER BY t_date DESC;');
        if(!$stmt->execute(array($user_id))){
            $stmt = null;
            header("Location: ../todo.php?error=stmtfailed");
            exit();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
 
    protected function getDoneTasks($user_id){
        $stmt = $this->connect()->prepare('SELECT * FROM tasks WHERE user_id = ? AND done = 1 ORDER BY t_date DESC;');
        if(!$stmt->execute(array($user_id))){
            $stmt = null;
            header("Location: ../todo.php?error=stmtfailed");
            exit();
        }
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function doneTask($taskid){
        $stmt = $this->connect()->prepare("UPDATE tasks SET done = 1 WHERE id=?;");
        if(!$stmt->execute(array($taskid))){
            $stmt = null;
            header("Location: ../todo.php?error=stmtfailed");
            exit();
        }
    }
    protected function deleteTask($taskid){
        $stmt = $this->connect()->prepare("DELETE FROM tasks WHERE id=?;");
        if(!$stmt->execute(array($taskid))){
            $stmt = null;
            header("Location: ../todo.php?error=stmtfailed");
            exit();
        }
    }
     
}