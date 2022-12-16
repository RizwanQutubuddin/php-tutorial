<?php
interface parent1{
    function calc($a,$b);
}

interface parent2{
    function sub($a,$b);
}

class child implements parent1,parent2{
    public function calc($a,$b){
        echo $a + $b;
    }

    public function sub($a,$b){
        echo $a - $b;
    }
}

$child=new child();

echo $child->calc(3,2);
?>  