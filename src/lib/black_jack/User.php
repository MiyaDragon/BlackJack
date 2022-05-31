<?php

namespace BlackJack;

require_once('Deck.php');
require_once('Hand.php');

abstract class User
{
    abstract public function actionJudge(): string;

    public const ACTION_HIT = 'H';
    public const ACTION_STAND = 'S';
    public const DRAW_STOP_SCORE = 17;

    public Hand $hand;

    public function __construct(protected string $name)
    {
        $this->hand = new Hand();
    }

    public function drawCards(Deck $deck, int $drawNum): void
    {
        $cards = $deck->drawCards($drawNum);
        foreach ($cards as $card) {
            echo $this->name . 'の引いたカードは' . $card->getSuit() . 'の' . $card->getNumber() . 'です。' .  PHP_EOL;
            $this->addhand($card);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addHand(Card $card): void
    {
        $this->hand->addHand($card);
    }

    /**
     * @return array<int, Card>
     */
    public function getHand(): array
    {
        return $this->hand->getHand();
    }

    public function calculateHandScore(): void
    {
        $this->hand->calculateHandScore();
    }

    public function getHandScore(): int
    {
        return $this->hand->getHandScore();
    }

    public function hit(Deck $deck, int $drawNum): void
    {
        $this->drawCards($deck, $drawNum);
    }
}
