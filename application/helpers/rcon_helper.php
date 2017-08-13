<?php
/**
 * Created with ♥ by Verlikylos on 13.08.2017 23:49.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
 */

require_once(APPPATH.'libraries/Rcon.class.php');

function rconCommand($commands, $player, $ip, $rconPort, $rconPass) {
    $rcon = new \thedudeguy\Rcon($ip, $rconPort, $rconPass, 3);

    if ($rcon->connect()) {
        foreach ($commands as $command) {
            $rcon->send_Command(str_replace('{PLAYER}', $player, $command));
        }
    } else {
        return array('value' => false, 'message' => 'Wystąpił błąd podczas komunikacji z serwerem!');
    }

    return array('value' => true, 'message' => 'Polecenia zostały pomyślnie wysłane na serwer');
}