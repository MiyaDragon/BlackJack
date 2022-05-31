<?php

namespace BlackJack;

require_once('Dealer.php');
require_once('Deck.php');
require_once('HandEvaluator.php');

class BlackJackGame
{
    private const FIRST_DRAW_NUM = 2;
    private const CONTINUE_DRAW_NUM = 1;
    private const ACTION_HIT = 'H';
    private const ACTION_STAND = 'S';
    private const DRAW = 'draw';

    /**
     * @var array<int, User>
     */
    private array $players;
    private Dealer $dealer;
    private Deck $deck;

    public function __construct(object ...$players)
    {
        $this->players = $players;
        $this->dealer = new Dealer('ディーラー');
        $this->deck = new Deck();
    }

    public function start(): void
    {
        echo 'ブラックジャックを開始します。' . PHP_EOL;

        foreach ($this->players as $player) {
            $player->drawCards($this->deck, self::FIRST_DRAW_NUM);
        }
        $this->dealer->drawCards($this->deck, self::FIRST_DRAW_NUM);

        foreach ($this->players as $player) {
            $this->actionChoice($player);
        }
        $this->actionChoice($this->dealer);

        $handEvaluator = new HandEvaluator();
        foreach ($this->players as $player) {
            echo '--------------------' . PHP_EOL;
            $winner = $handEvaluator->getWinner($player, $this->dealer);
            $this->showWinner($winner);
        }

        echo 'ブラックジャックを終了します。' . PHP_EOL;
    }

    private function actionChoice(object $user): void
    {
        while (true) {
            $user->calculateHandScore();
            if (HandEvaluator::isBust($user->getHandScore())) {
                break;
            }
            $action = $user->actionJudge();
            if ($action === self::ACTION_HIT) {
                $user->hit($this->deck, self::CONTINUE_DRAW_NUM);
            } elseif ($action === self::ACTION_STAND) {
                break;
            } else {
                echo 'HかSで入力してください。' . PHP_EOL;
            }
        }
    }

    private function showWinner(string $winner): void
    {
        if ($winner === self::DRAW) {
            echo '同点です。' . PHP_EOL;
        } else {
            echo $winner . 'の勝ちです！' . PHP_EOL;
        }
    }
}
