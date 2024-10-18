<?php declare(strict_types=1);

namespace App\Tests\MatchMaker\Player;

use PHPUnit\Framework\TestCase;
use App\MatchMaker\Player\Player;
use App\MatchMaker\Player\QueuingPlayer;

class QueuingPlayerTest extends TestCase{

  public function testCreateQueuingPlayer()
  {
    $playerName = 'Player1';
    $player = new Player($playerName);
    $queuingPlayer = new QueuingPlayer($player);
    $this->assertInstanceOf(QueuingPlayer::class,$queuingPlayer);

    $this->assertEquals($player, $queuingPlayer->getPlayer());
  }

  public function testCreateQueuingPlayerWithRatio()
  {
    $playerName = 'Player1';
    $playerRatio = 350;
    $player = new Player($playerName, $playerRatio );
    $queuingPlayer = new QueuingPlayer($player);
    $this->assertInstanceOf(QueuingPlayer::class,$queuingPlayer);

    $this->assertEquals($playerName, $queuingPlayer->getName());
    $this->assertEquals($playerRatio, $queuingPlayer->getRatio());
  }
}