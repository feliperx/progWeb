<?php


class Car {
  public $color;
  public $model;
  
  
  //Construtor
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  
  //metodo
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }
}

$myCar = new Car("black", "Volvo");
echo $myCar -> message();
echo "<br>";
$myCar = new Car("red", "Toyota");
echo $myCar -> message();


?>