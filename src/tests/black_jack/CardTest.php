<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\Card;

require_once(__DIR__ . '/../../lib/black_jack/Card.php');

class CardTest extends TestCase
{
    public function testGetSuit()
    {
        $card = new Card('C', 5);
        $this->assertSame('C', $card->getSuit());
    }

    public function testGetNumber()
    {
        $card = new Card('C', 5);
        $this->assertSame('5', $card->getNumber());
    }

    public function testGetRank()
    {
        $card = new Card('C', 5);
        $rank = $card->getRank();
        $this->assertSame(5, $rank);
    }

    public function testGetRankA()
    {
        $card = new Card('C', 5);
        $this->assertSame(1, $card->getRankA(11));
    }
}
