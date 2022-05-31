<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\PlayerCpu;
use BlackJack\Card;

require_once(__DIR__ . '/../../lib/black_jack/PlayerCpu.php');
require_once(__DIR__ . '/../../lib/black_jack/Deck.php');

class PlayerCpuTest extends TestCase
{
    public function testGetName()
    {
        $playerCpu = new PlayerCpu('佐藤');
        $name = $playerCpu->getName();
        $this->assertSame('佐藤', $name);
    }

    public function testGetHand()
    {
        $playerCpu = new PlayerCpu('佐藤');
        $card = new Card('ハート', 'K');
        $playerCpu->addHand($card);
        $this->assertSame([$card], $playerCpu->getHand());
    }

    public function testGetHandScore()
    {
        $playerCpu = new PlayerCpu('佐藤');
        $playerCpu->addHand(new Card('ハート', 'K'));
        $playerCpu->addHand(new Card('クラブ', 'K'));
        $playerCpu->calculateHandScore();
        $this->assertSame(20, $playerCpu->getHandScore());
    }

    public function testActionJudge()
    {
        $playerCpu = new PlayerCpu('佐藤');
        $playerCpu->addHand(new Card('ハート', 'K'));
        $playerCpu->calculateHandScore();
        $this->assertSame('H', $playerCpu->actionJudge());
    }
}
