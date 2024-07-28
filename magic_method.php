<?php
class DemoClass
{
    public $name;

    public function __construct()
    {
        echo "at intense";
    }

    public function hey()
    {
        echo "Hello man!";
    }

    public function getMethods()
    {
        echo "getMethods()";
    }
    
    public function __destruct()
    {
        echo "__destruct";
    } 

    public function __call($method, $args)
    {
        echo "__call";
    }
    
    public function __invoke()
    {
        echo "__invoke";
    }
    
    public function __wakeup()
    {
        echo "__wakeup";
    }
    
    public function __sleep()
    {
        echo "__sleep";
    }
}

$a = new DemoClass;
$a->hey();