<?php 

class Car
{
  private $brand;
  private $color;

  public function __construct($marque,$couleur)
  {
     $this->brand=$marque;
     $this->color=$couleur;
  }


}
class Dacia extends Car
{
  private $moteur;

  public function __construct($moteur)
  {
    $this->moteur=$moteur;
  }

}
$tonobil=new Dacia("qsdfg");
$car1=new Car("fiat","black");
print_r($car1);
print_r($tonobil);



?>