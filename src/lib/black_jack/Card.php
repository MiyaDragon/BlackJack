<?php

namespace BlackJack;

class Card
{
    private const CARD_RANK = [
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10,
    ];
    private const CARD_RANK_MAX_A = 11;
    private const CARD_RANK_MIN_A = 1;

    public function __construct(private string $suit, private string $number)
    {
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getRank(): int
    {
        return self::CARD_RANK[$this->number];
    }

    public function getRankA(int $handScore): int
    {
        $cardRank = self::CARD_RANK_MIN_A;
        if ($handScore <= 10) {
            $cardRank = self::CARD_RANK_MAX_A;
        }
        return $cardRank;
    }
}
