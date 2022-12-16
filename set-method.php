<?php
    class student{
        private $name='Rizwan';

        public function show(){
            echo $this->name;
        }
        public function __get($property){
            echo "You are trying to access Non-existing or private property($property)";

        }

        public function __set($property,$value){
            if(property_exists($this,$property)){
                $this->$property=$value;
            }else{
                echo "this is a Non-existing or private property($property)";
            }
        }
    }

    $test=new student();
    $test->name='asdf';
    $test->show();
?>