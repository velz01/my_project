<?php

class Human {
    public $name;
    public $age;



    public function setName($mda) {
        $this->name = $mda;
    }

    public function getName() {
        return $this->name;
    }
}

$human1 = new Human();
print_r($human1);
$human1->setName('Bob');
print_r($human1);
print_r($human1->getName());
