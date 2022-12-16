<?php
class Person{
    public $name;
    public $age;

    function __construct($name="Unknown",$age=0){
        $this->name=$name;
        $this->age=$age;
    }

    function show(){
        return $this->name." ".$this->age;
    }
}

$person=new Person();
$person1=new Person("Rizwan",10);
$person2=new Person("Shabana",20);
echo $person->show()."<br>";
echo $person1->show()."<br>";
echo $person2->show()."<br>";
?>