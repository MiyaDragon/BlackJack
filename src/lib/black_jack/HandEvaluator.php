<?php

namespace BlackJack;

class HandEvaluator
{
    private const BUST_SCORE = 22;
    private const BLACK_JACK_SCORE = 21;

    public function getWinner(User $player, Dealer $dealer): string
    {
        $playerScore = $player->getHandScore();
        $playerName = $player->getName();
        $dealerScore = $dealer->getHandScore();
        $dealerName = $dealer->getName();
        echo $playerName . 'の得点は' . $playerScore . 'です。' . PHP_EOL;
        echo $dealerName . 'の得点は' . $dealerScore . 'です。' . PHP_EOL;

        $winner = 'draw';

        if ($this->isBust($playerScore)) {
            $winner = $dealerName;
        } elseif ($this->isBust($dealerScore)) {
            $winner = $playerName;
        } elseif ($this->isPlayerWinner($playerScore, $dealerScore)) {
            $winner = $playerName;
        } elseif ($this->isDealerWinner($playerScore, $dealerScore)) {
            $winner = $dealerName;
        } elseif ($this->isPush($playerScore, $dealerScore)) {
            $winner = 'draw';
        }

        return $winner;
    }

    public static function isBust(int $score): bool
    {
        return $score >= self::BUST_SCORE;
    }

    private function isPlayerWinner(int $playerScore, int $dealerScore): bool
    {
        return (self::BLACK_JACK_SCORE - $playerScore) < (self::BLACK_JACK_SCORE - $dealerScore);
    }

    private function isDealerWinner(int $playerScore, int $dealerScore): bool
    {
        return (self::BLACK_JACK_SCORE - $playerScore) > (self::BLACK_JACK_SCORE - $dealerScore);
    }

    private function isPush(int $playerScore, int $dealerScore): bool
    {
        return $playerScore === $dealerScore;
    }
}
