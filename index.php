<?php
// 1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)
//================================1 No answer========================

  $array = ['aa', 'bb', 'c', 'ccc', 'a', 'ertre'];

  usort($array, function($a, $b){
     return strlen($a) < strlen($b);
  });

  var_export($array);




//   2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
//================================2 no answer ======================

  $a = 'Geeksfor';
  $b = "Geeks";
  $c = "$a {$b}";
  echo " $c \n";




//   3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
//===============================3 No answer =======================

  $fruits = array( 'apple', 'banana',  'cherry');

 
  array_pop($fruits);
  array_shift($fruits);
  print_r($fruits);

//==============================4 No========================

 
//5.Write a PHP function to find the second largest number in an array of numbers.
//==============================5 No answer========================

$array = array('200', '15','69','122','50','201');
$max_1 = $max_2 = 0;

for ($i=0; $i<count($array); $i++) {
    if ($array[$i] > $max_1) {
      $max_2 = $max_1;
      $max_1 = $array[$i];
    } else if ($array[$i] > $max_2 && $array[$i] != $max_2) {
      $max_2 = $array[$i];
    }
}
 
echo "Smax_2nd =".$max_2;
 