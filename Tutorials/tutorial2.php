<?php
 $m=1; $n=6;
for($i=1; $i<=6; $i++) {
    for($j=$i; $j<=5; $j++) {
        echo "&nbsp;&nbsp;";
    }
    for($k=1; $k<=$m; $k++)  {
        echo "*";
    }
    for($c=$m; $c>1; $c--) {
        echo "*";
    }
    echo "<br>";
    $m++;
}
 
for($i=1; $i<=6; $i++) {
    for($j=$i; $j>=1; $j--) {
        echo "&nbsp;&nbsp;";
    }
    for($k=$n; $k>1; $k--) {
        echo "*";
    }
    for($c=$n-1; $c>1; $c--) {
        echo "*";
    }
    echo "<br>";
    $n--;
} ?>