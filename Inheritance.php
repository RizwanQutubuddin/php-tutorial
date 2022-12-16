<?php
    class Employee{
        public $age;
        public $name;
        public $salery;
        
        function __construct($n,$a,$s){
            $this->name=$n;
            $this->age=$a;
            $this->salary=$s;
        }

        function info(){
            echo"<h1>Employee Info</h1><br>";
            echo "Employee Name ".$this->name.'<br>';
            echo "Employee Age ".$this->age.'<br>';
            echo "Employee Salary ".$this->salary.'<br>';
        }
    }

    class Manager extends Employee{
        public $totalSalary;
        public $phone=300;
        public $ta=1000;

        function info(){
            echo"<h1>Manager Info</h1><br>";
            echo "Manager Name ".$this->name.'<br>';
            echo "Manager Age ".$this->age.'<br>';
            echo "Manager Salary ".$this->salary + $this->phone + $this->ta.'<br>';
        }
    }

    $employee=new Employee("Rizwan",30,1000);
    $manager=new Manager("Shabana",20,1000);
    $employee->info();
    echo"<br>";
    $manager->info();
?>