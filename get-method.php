<?php
class abc{

    private $name='Rizwan';
    private $age=33;
    private $data=['name'=>'yahoo baba','age'=>10];
    public function getName(){}

    public function __get($property){
        if(array_key_exists($property,$this->data)){
            return $this->data[$property];
        }else{
            return "You are trying to access Non-existing or private property($property)";
        }
    }
}

$abc=new abc();
echo $abc->name;

?>