<?php

namespace Fogio\Util;

class MiddlewareProcess
{
    protected $_tasks;
    protected $_method;

    public function __construct($tasks, $method = '__invoke', $params = [])
    {
        $this->_tasks = $tasks;
        $this->_method = $method;
        foreach ($params as $k => $v) {
            $this->$k = $v;
        }
    }

    public function __invoke()
    {
        $task = array_shift($this->_tasks);
        if ($task) {
            $taks->{$this->_method}($this);
        }
        
        return $this;
    }

    public function unshift($tasks)
    {
        $this->_tasks = array_merge($tasks, $this->_tasks);

        return $this; 
    }

    public function push($tasks)
    {
        $this->_tasks = array_merge($this->_tasks, $tasks);

        return $this; 
    }

}
