<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\Dealer;
use BlackJack\Card;

require_once(__DIR__ . '/../../lib/black_jack/Dealer.php');
require_once(__DIR__ . '/../../lib/black_jack/Deck.php');

class DealerTest extends TestCase
{
    public function testGetName()
    {
        $dealer = new Dealer('ディーラー');
        $name = $dealer->getName();
        $this->assertSame('ディーラー', $name);
    }

    public function testGetHand()
    {
        $dealer = new Dealer('ディーラー');
        $card = new Card('ハート', 'K');
        $dealer->addHand($card);
        $this->assertSame([$card], $dealer->getHand());
    }

    public function testGetHandScore()
    {
        $dealer = new Dealer('ディーラー');
        $dealer->addHand(new Card('ハート', 'K'));
        $dealer->addHand(new Card('クラブ', 'K'));
        $dealer->calculateHandScore();
        $this->assertSame(20, $dealer->getHandScore());
    }

    public function testActionJudge()
    {
        $dealer = new Dealer('ディーラー');
        $dealer->addHand(new Card('ハート', 'K'));
        $dealer->calculateHandScore();
        $this->assertSame('H', $dealer->actionJudge());
    }
}
