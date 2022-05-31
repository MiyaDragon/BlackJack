<?php

namespace BlackJack;

require_once('User.php');
require_once('Deck.php');

class Dealer extends User
{
    private const SECOND_CARDS_INDEX = 1;

    public function drawCards(Deck $deck, int $drawNum): void
    {
        $cards = $deck->drawCards($drawNum);
        foreach ($cards as $index => $card) {
            $this->addHand($card);
            if ($index === self::SECOND_CARDS_INDEX) {
                echo $this->name . 'の引いた2枚目のカードは分かりません。' .  PHP_EOL;
                break;
            }
            echo $this->name . 'の引いたカードは' . $card->getSuit() . 'の' . $card->getNumber() . 'です。' .  PHP_EOL;
        }
    }

    public function actionJudge(): string
    {
        $hand = $this->getHand();
        if (count($hand) === 2) {
            echo $this->name . 'の引いた2枚目のカードは' . $hand[1]->getSuit() . 'の' . $hand[1]->getNumber() . 'でした。' . PHP_EOL;
        }

        $action = self::ACTION_STAND;
        if ($this->getHandScore() < self::DRAW_STOP_SCORE) {
            $action = self::ACTION_HIT;
            echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です。' . PHP_EOL;
        }
        return $action;
    }
}
