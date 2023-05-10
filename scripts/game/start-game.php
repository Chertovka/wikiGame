<?php

require_once('./classes/Game.php');
require_once 'controller/func.php';

include('scripts/entry/entry.php');

use Game\Game;

$obGame = new Game();

$startAndFinishLinks = $obGame->get_start_and_finish_wiki_links();
$startlink = $startAndFinishLinks[0];
$finishlink = $startAndFinishLinks[1];
var_dump($startAndFinishLinks);

if (isset($_COOKIE['player_ips'])) {
    $player_name = $_COOKIE["name"];
    if ($_GET['title']) {
        $link = $obGame->get_wiki_links();
    } else {
        echo $startlink;
        echo $finishlink;
    }

    $full_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    $html = file_get_contents($full_url);
//    echo $html;



//    if (preg_match('//', $html)) {
//        echo 'Найдено!';
//    } else {
//        echo 'Не найдено';
//    }

//        $obGameLinks = $this->get_wiki_links();
//        $player_name = $_POST['name']; // имя
//        $player_choice = $_POST['player_choice']; // выиграл/проиграл/ничья
//        $transitions = $_POST['transitions']; // количество ходов
//
//        $data = [
//            'player_name' => $player_name,
//            'player_choice' => $player_choice,
//            'transitions' => $transitions,
//        ];
//        $query = pdo()->prepare("INSERT INTO players
//                        (player_name, player_choice, transitions)
//                        VALUES (:player_name, :player_choice, :transitions)");
//
//        $query->execute($data);

//    header('Location: ?mode=finish');
    exit;

//    echo "There are " . count($player_ips) . " players in the game.";
}

