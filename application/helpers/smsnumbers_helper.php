<?php

 /**
 * Created with ♥ by Verlikylos on 21.03.2017 22:51.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
 */

function getSmsNumbers() {
    return array('71480' => 1, '72480' => 2, '73480' => 3, '74480' => 4, '75480' => 5, '76480' => 6, '79480' => 9, '91400' => 14, '91900' => 19, '92022' => 20, '92521' => 25);
}

function getPriceNetto($number) {
    $numbers = getSmsNumbers();
    foreach ($numbers as $numb => $cost) {
        if ($numb == $number) return $cost;
    }
    return null;
}

function getPriceBrutto($number) {
    foreach (getSmsNumbers() as $numb => $cost) {
        if ($numb == $number) return round(($cost + (0.23 * $cost)), 2);
    }
    return null;
}
