<?php

namespace BlackJack;

require_once('Player.php');
require_once('PlayerCpu.php');
require_once('BlackJackGame.php');

$player = new Player('あなた');
$cp1 = new PlayerCpu('CP1');
$cp2 = new PlayerCpu('CP2');
$game = new BlackJackGame($player, $cp1, $cp2);
$game->start();
