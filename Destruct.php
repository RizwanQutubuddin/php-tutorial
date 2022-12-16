<?php

class abc{
    public function __construct(){
        echo"this is Constructor method<br>";
    }

    public function hello(){
        echo"this is hello method<br>";
    }

    public function __destruct(){
        echo"this is Destructor method<br>";
    }
}

$abc=new abc();
$abc->hello();
?>