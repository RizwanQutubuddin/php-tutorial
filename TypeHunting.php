<?php

//============== start ===========
class school{
    public function getNames(student $student){
        foreach ($student->names() as $name) {
            echo "hi ".$name."<br>";
        }
    }
}

class student{
    public function names(){
        return ['aaa','sss','ddd'];
    }
}

class Obj{

}

$student=new student();
$school=new school();
$obj=new Obj();

$school->getNames($student);
//============== end ===========


//============== start ===========
// class hello{
//     public function sayhello(){
//         echo "say hello everyone \n";
//     }
// }

// class bye {
//     public function saybye(){
//         echo "say bye everyone \n";
//     }
// }


// function wow(hello $c){
//     $c->sayhello();
// }

// $obj=new hello();

// wow($obj);
//============== end =============

//============== start ===========
// function sum(int $value){
//     echo $value+10;
// }
// sum('as');

// function fruits(array $names){
//     foreach ($names as $name) {
//         echo $name."<br>";
//     }
// }

// $fruitsName=['mango','banana'];
// fruits($fruitsName);
//==============end===========

?>