<?php

namespace BlackJack;

class Hand
{
    /**
     * @var array<int, Card>
     */
    private array $hand = [];
    private int $handScore = 0;

    public function addHand(Card $card): void
    {
        $this->hand[] = $card;
    }

    /**
     * @return array<int, Card>
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    public function calculateHandScore(): void
    {
        $this->handScore = 0;
        foreach ($this->hand as $card) {
            if ($card->getNumber() === 'A') {
                $this->handScore += (int) $card->getRankA($this->handScore);
            } else {
                $this->handScore += (int) $card->getRank();
            }
        }
    }

    public function getHandScore(): int
    {
        return $this->handScore;
    }
}
