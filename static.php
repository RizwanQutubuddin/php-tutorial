<?php
    class base{
        public static $name="Rizwan1";
        

        function __construct($n){
            self::$name=$n;
        }
    }

    class derived extends base{
        public static function show(){
            echo parent::$name;
        }
    }
    echo derived::show();
    
?>