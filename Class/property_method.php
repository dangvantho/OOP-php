<?php
// class Animal {
//     public $name = "Kitty";
//     private $type = "Cat";
//     protected $age = 2;
//     public function getAge(){
//         return $this->age;
//     }
//     public function setAge($_age) {
//         $this->age = $_age;
//     }
//     public  function getType() {
//         return $this->type;
//     }
//     public function setType($_type) {
//         $this->type = $_type;
//     }
// }
// $cat = new Animal();
// $cat->name = "Mun";
// $cat->setAge(1);
// $cat->setType("Mèo");
// echo $cat->name."-".$cat->getAge()."-".$cat->getType();
//Sự khác nhau giữa private và protected
//Không thể truy cập được giá trị private ở lớp con hoặc ở bên ngoài => dùng getter, setter để set giá trị / lấy giá trị
class Animal {
    private $type = "animal";
    protected $age;
    public $name;
    public function getType() {
        return $this->type;
    }
    protected function setType($_type = "animal") {
        $this->type = $_type;
    }
    public function getAge() {
        return $this->age;
    }
    public function setAge($_age) {
        $this->age = $_age;
    }
}
class Cat extends Animal {
    public function __construct($_name, $_age = 2) {
        parent::setType("cat");
        parent::setAge($_age);
        $this->name = $_name;
    }
}
$mun = new Cat("mun");
echo $mun->getType()."-".$mun->name."-".$mun->getAge();


