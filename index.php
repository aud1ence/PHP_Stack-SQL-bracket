<?php

use App\StackBracket;

require_once "vendor/autoload.php";

$test = new StackBracket();
//$a = $test->checkBracket("(– b + (b2 – 4*a*c)^0.5) / 2*a");
//var_dump($a);
$a = $test->checkBracketAll("('[5] * 3 - ( 4 - 7 * [3-6')");
var_dump($a);
//echo $test->getElement();
