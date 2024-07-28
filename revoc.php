<?php

//  \Attribute
//  \AllowDynamicProperties
//  \ReturnTypeWillChange
//  \SensitiveParameter

#[\Attribute(\Attribute::TARGET_CLASS)]
class MyAttribute {

   // #[\Attribute(\Attribute::TARGET_METHOD)]
    public function hey()
    {
        echo "Hello man!!!!!!!";
    }
}
#[\Attribute(\Attribute::TARGET_METHOD)]
class MyMethod {

   // #[\Attribute(\Attribute::TARGET_METHOD)]
    public function __construct()
    {
        echo "MyMethod";
    }
}

#[\Attribute(\Attribute::TARGET_ALL)]
#[MyAttribute]
class DemoClass
{
    const IS_READONLY = 65536;
    public $name;

    public function __construct()
    {
        echo "at intense";
    }

    #[MyMethod()]
    public function hey()
    {
        echo "Hello man!";
    }

    public function __destruct()
    {
        echo "__destruct";
    }
}

$a = new DemoClass;
$a->hey();

$reflectMethod = (new \ReflectionMethod("DemoClass::hey"));
$reflectClass = (new \ReflectionClass($a));
// $export = $reflectClass->export();

/*
    This method will get all attributes of class.
*/
$attributes = $reflectClass->getAttributes();
// $attributes[1]->getName();     // "MyAttribute"
// $attributes[1]->getArguments();// get all arguments as array for target class
// $attributes[1]->newInstance(); // create new instance of target class

/*
    This method will get Constant of class by name.
*/
// $constants = $reflectClass->getConstant("IS_READONLY");

/*
    This method will get Method of class by name (ReflectionMethod) and (ReflectionMethod->invoke) callable.
*/
// $method = $reflectClass->getMethod("hey"); //->invoke($a);

// echo "<pre>";
// echo json_encode($attributes);
var_dump($reflectMethod);
// echo "</pre>";