<?php

class TaskContr extends Task{
    public function addTask($t_name, $t_desc, $t_date, $t_user){
        $this->setTask($t_name, $t_desc, $t_date, $t_user);
    }
    public function moveTaskToDone($taskid){
        $this->doneTask($taskid);
    }
    public function removeTask($taskid){
        $this->deleteTask($taskid);
    }

}