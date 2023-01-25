<?php

$num = -10;
 

$result=($num>0 ? "positive" :
        ($num<0 ? "negative" :
        ($num<-10 ? "value is below -10" : "its zero")));
         
echo $result;

 ?>