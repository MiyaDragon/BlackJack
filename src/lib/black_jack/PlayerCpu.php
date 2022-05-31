<?php

namespace BlackJack;

require_once('User.php');
require_once('Deck.php');

class PlayerCpu extends User
{
    public function actionJudge(): string
    {
        $action = self::ACTION_STAND;
        if ($this->getHandScore() < self::DRAW_STOP_SCORE) {
            $action = self::ACTION_HIT;
            echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です。' . PHP_EOL;
        }
        return $action;
    }
}
