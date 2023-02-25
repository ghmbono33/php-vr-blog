<?php
class Fruta
{
  public $nombre;
  function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
}
$f1 = new Fruta();
$f1->setNombre("Melón");
echo $f1->nombre;
