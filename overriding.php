<?php
    class Base{
        public $name="Raju";
    }
    class Derived extends Base{
        public $name="Rizwan";
    }

    $derived=new Derived();
    echo $derived->name;
?>