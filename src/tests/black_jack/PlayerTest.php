<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\Player;
use BlackJack\Card;

require_once(__DIR__ . '/../../lib/black_jack/Player.php');
require_once(__DIR__ . '/../../lib/black_jack/Deck.php');

class PlayerTest extends TestCase
{
    public function testGetName()
    {
        $player = new Player('田中');
        $name = $player->getName();
        $this->assertSame('田中', $name);
    }

    public function testGetHand()
    {
        $player = new Player('田中');
        $card = new Card('ハート', 'K');
        $player->addHand($card);
        $this->assertSame([$card], $player->getHand());
    }

    public function testGetHandScore()
    {
        $player = new Player('田中');
        $player->addHand(new Card('ハート', 'K'));
        $player->addHand(new Card('クラブ', 'K'));
        $player->calculateHandScore();
        $this->assertSame(20, $player->getHandScore());
    }
}
