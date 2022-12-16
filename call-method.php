<?php

    class student{
        private $firstName;
        private $lastName;

        private function setName($fname,$lname){
            $this->firstName=$fname;
            $this->lastName=$lname;
        }

        public function __call($method,$args){
            if(method_exists($this,$method)){
                call_user_func_array([$this, $method],$args);
            }else{
                echo "This is private or Non existing method : $method<br>";print_r($args);
            }
        }
    }

    $stu=new student();

    $stu->setName('Rizwan','Ali');

    echo"<pre>";
    print_r($stu);
    echo"</pre>";


?>