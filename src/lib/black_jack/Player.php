<?php

namespace BlackJack;

require_once('User.php');
require_once('Deck.php');

class Player extends User
{
    public function actionJudge(): string
    {
        echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です。カードを引きますか？（H:ヒット / S:スタンド）' . PHP_EOL;
        return trim(fgets(STDIN));
    }
}
