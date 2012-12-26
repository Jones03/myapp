<?php

namespace Pegasus\TestBundle\Entity;

class Task
{
    private $task;

    private $dueDate;
    
    public function setTask($task)
    {
        $this->task = $task;
    
        return $this;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    
        return $this;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
}
