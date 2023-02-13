<?php

//No-1=============================

function isEven($i){
  if($i%2==0){
    return true ;
  }return false;
}
$i=13;
if(isEven($i)){
  echo "{$i} is an even number";
}else{
  echo "{$i} is an odd number";
}
 

//No-2=============================
 $sum=0; 
 for ($i=1; $i<=100; $i++) { 
   $sum=$sum+$i; 
} 
   echo $sum;  