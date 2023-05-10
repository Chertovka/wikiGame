<?php
/**
 * Главный файл
 */

session_start();

header('Content-Type: text/html; charset=UTF8');
error_reporting(E_ALL);

ob_start();

$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
$err = array();

include './config.php';
include './bd/bd.php';
include './controller/func.php';

switch ($mode) {
    case 'entry':
        include './scripts/entry/entry.php';
        include './scripts/entry/entry_form.php';
        break;

    case 'start-game':
        include './scripts/game/start-game.php';
        break;

    case 'finish':
        include './scripts/game/finish.php';
        include './scripts/game/finish_form.php';
        break;
}

$content = ob_get_contents();

ob_end_clean();

include './html/index.php';
?>