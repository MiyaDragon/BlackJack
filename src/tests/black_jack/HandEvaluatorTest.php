<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\HandEvaluator;

require_once(__DIR__ . '/../../lib/black_jack/HandEvaluator.php');

class HandEvaluatorTest extends TestCase
{
    public function testIsBust()
    {
        $handEvaluator = new HandEvaluator();
        $score = 23;
        $this->assertSame(true, $handEvaluator->isBust($score));
    }

    public function testIsPlayerWinner()
    {
        $method = new \ReflectionMethod(HandEvaluator::class, 'isPlayerWinner');
        $method->setAccessible(true);
        $playerScore = 21;
        $dealerScore = 20;
        $this->assertTrue($method->invoke(new HandEvaluator, $playerScore, $dealerScore));
        $method->invoke(new HandEvaluator, $playerScore, $dealerScore);
    }

    public function testIsDealerWinner()
    {
        $method = new \ReflectionMethod(HandEvaluator::class, 'isDealerWinner');
        $method->setAccessible(true);
        $playerScore = 20;
        $dealerScore = 21;
        $this->assertTrue($method->invoke(new HandEvaluator, $playerScore, $dealerScore));
        $method->invoke(new HandEvaluator, $playerScore, $dealerScore);
    }

    public function testIsPush()
    {
        $method = new \ReflectionMethod(HandEvaluator::class, 'isPush');
        $method->setAccessible(true);
        $playerScore = 20;
        $dealerScore = 20;
        $this->assertTrue($method->invoke(new HandEvaluator, $playerScore, $dealerScore));
        $method->invoke(new HandEvaluator, $playerScore, $dealerScore);
    }
}
