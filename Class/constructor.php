<?php
class Animal{
    // public function __construct($name, $age = 2){
    //     $this->name = $name;
    //     $this->age = $age;
    // }
    //Truyền tham số mặc định array
    public $initArray = [
        "name" => "Kitty",
        "age"  => 2,
        "color"=> "Red",
    ];
    // public function __construct($arr) {
    //     if(!isset($arr)) {
    //         $arr = $this->initArray;
    //     }
    //     $this->name = $arr['name'];
    //     $this->age = $arr['age'];
    // }
}
$dog = new Animal();
echo $dog->initArray["name"];
// echo $dog->name." có số tuổi là: ".$dog->age;