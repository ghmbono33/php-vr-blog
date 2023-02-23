<?php
$y = 1;

$fn1 = fn ($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
  return $x + $y;
};

var_export($fn1(3));


// function multiplicar($x, $y) => $x 
// function cuadrado($x)
// {
//   return $x * $x;
// }
// $numeros = [];
// for ($i = 0; $i < 20; $i++) {
//   $numeros[] = rand(0, 100);
// }
// print_r($numeros);
// $numeros_cuadrados = array_map("cuadrado", $numeros);
// print_r($numeros_cuadrados);
// echo "This spans
// multiple lines. The newlines will be
// output as well";
