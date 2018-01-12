<?php
/**
 * Created by PhpStorm.
 * User: melan
 * Date: 12-1-2018
 * Time: 11:49
 */


$bedrag_inc = 13.03;
$btw = 21; // 0 - 6 - 19

echo 'Bedrag inclusief: '.$bedrag_inc .'<br>';

$bedrag_ex = $bedrag_inc/(100+$btw)*100;
echo 'Bedrag exclusief: '.$bedrag_ex.'<br>'; //totaal

$bedrag_ex = round($bedrag_ex, 2); //totaal afgerond
echo 'Eindbedrag: '.$bedrag_ex.'<br>';
?>