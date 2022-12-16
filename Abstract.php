<?php

    abstract class parentClass{
        protected $name='rizwan';
        abstract protected function cal($a,$b);

    }

    class childClass extends parentClass{
        public $name='rizwan';
        function cal($a,$b){
            echo $a+$b;
        }

    }
    $a=new childClass();
    $a->cal(1,3);
?>