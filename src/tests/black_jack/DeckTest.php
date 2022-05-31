<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\Deck;

require_once(__DIR__ . '/../../lib/black_jack/Deck.php');

class DeckTest extends TestCase
{
    public function testDrawCards()
    {
        $deck = new Deck();
        $cards = $deck->drawCards(2);
        $this->assertSame(2, count($cards));
    }
}
