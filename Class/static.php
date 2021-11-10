<?php
class Animal {
    private static $type;
    public function getType()
    {
        return Animal::$type;
    }
    public function setType($_type)
    {
        Animal::$type = $_type;
    }
}
$dog = new Animal();
$cat = new Animal();
$dog->setType("dog");
//Không set type cho meo nhung meo vẫn có type do biến static dùng chung cho các instance
echo $cat->getType();
?>