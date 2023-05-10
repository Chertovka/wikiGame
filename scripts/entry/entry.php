<?php

require_once 'controller/func.php';

if (isset($_POST['submit-form'])) {
    if (empty($_POST['name'])) {
        $err[] = 'Поле имя не может быть пустым!';
    } else {
        if (!preg_match("/^[a-zA-Z0-9]+$/i", $_POST['name'])) {
            $err[] = 'Не правильно введено имя (введите имя на английском языке)' . "\n";
        }
    }

    if (isset($_COOKIE['player_ips'])) {
        $player_ips = unserialize($_COOKIE['player_ips']);
    } else {
        $player_ips = array();
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!in_array($ip, $player_ips)) {
            $player_ips[] = $ip;
            setcookie('player_ips', serialize($player_ips), time() + 3600);
            setcookie('name', $_POST['name']);
        }
    }

    if (count($err) > 0)
        echo showErrorMessage($err);
    else {
        $player_name = $_POST['name']; // имя

        header('Location: ?mode=start-game');
        exit;
    }
}


