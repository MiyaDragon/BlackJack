<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\Hand;
use BlackJack\Card;

require_once(__DIR__ . '/../../lib/black_jack/Hand.php');
require_once(__DIR__ . '/../../lib/black_jack/Card.php');

class HandTest extends TestCase
{
    public function testGetHand()
    {
        $hand = new Hand();
        $card = new Card('ハート', 'K');
        $hand->addHand($card);
        $this->assertSame([$card], $hand->getHand());
    }

    public function testGetHandScore()
    {
        $hand = new Hand();
        $hand->addHand(new Card('ハート', 'K'));
        $hand->addHand(new Card('クラブ', 'K'));
        $hand->calculateHandScore();
        $this->assertSame(20, $hand->getHandScore());
    }
}
