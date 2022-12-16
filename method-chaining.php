<?php

class abc{
    public function first(){
        echo"this is first method<br>";
    }
    public function second(){
        echo"this is second method<br>";
    }
    public function third(){
        echo"this is third method<br>";
    }
}

$abc=new abc();
$abc->first()->second()->third();
?>