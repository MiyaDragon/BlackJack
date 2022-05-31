<?php

namespace BlackJack\Test;

use PHPUnit\Framework\TestCase;
use BlackJack\Uset;

require_once(__DIR__ . '/../../lib/black_jack/User.php');

class UserTest extends TestCase
{
    public function testGetName()
    {
        $user = new class('田中') extends  User
        {
        };

        $name = $user->getName();
        // $expected = 'I\'m Alice.';

        $this->assertSame('田中', $name);
    }

    // public function testIsPlayerWinner()
    // {
    //     $method = new ReflectionMethod(HandEvaluator::class, 'isPlayerWinner');
    //     $method->setAccessible(true);
    //     $playerScore = 21;
    //     $dealerScore = 20;
    //     $this->assertTrue($method->invoke(new HandEvaluator, $playerScore, $dealerScore));
    //     $method->invoke(new HandEvaluator, $playerScore, $dealerScore);
    // }

    // public function testIsDealerWinner()
    // {
    //     $method = new ReflectionMethod(HandEvaluator::class, 'isDealerWinner');
    //     $method->setAccessible(true);
    //     $playerScore = 20;
    //     $dealerScore = 21;
    //     $this->assertTrue($method->invoke(new HandEvaluator, $playerScore, $dealerScore));
    //     $method->invoke(new HandEvaluator, $playerScore, $dealerScore);
    // }

    // public function testIsPush()
    // {
    //     $method = new ReflectionMethod(HandEvaluator::class, 'isPush');
    //     $method->setAccessible(true);
    //     $playerScore = 20;
    //     $dealerScore = 20;
    //     $this->assertTrue($method->invoke(new HandEvaluator, $playerScore, $dealerScore));
    //     $method->invoke(new HandEvaluator, $playerScore, $dealerScore);
    // }
}
