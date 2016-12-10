<?php

namespace Fogio\Util;

class MiddlewareProcess
{
    protected $_queue;
    protected $_method;

    public function __construct($tasks, $method = '__invoke', $params = [])
    {
        $this->_queue = $tasks;
        $this->_method = $method;
        foreach ($params as $k => $v) {
            $this->$k = $v;
        }
    }

    public function __invoke()
    {
        $task = array_shift($this->_queue);
        if ($task) {
            $taks->{$this->_method}($this);
        }
        
        return $this;
    }

    public function prepend($tasks)
    {
        $this->_queue = array_merge($tasks, $this->_queue);

        return $this; 
    }

    public function append($tasks)
    {
        $this->_queue = array_merge($this->_queue, $tasks);

        return $this; 
    }

}
