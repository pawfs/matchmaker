<?php declare(strict_types=1);

namespace App\Tests\MatchMaker\Player;

use PHPUnit\Framework\TestCase;
use App\MatchMaker\Player\Player;

class PlayerTest extends TestCase
{
  public function testCreatePlayer()
  {
    $playerName = 'Player1';
    $player = new Player($playerName);
    $this->assertInstanceOf(Player::class,$player);

    $this->assertEquals($playerName, $player->getName());
  }

  public function testCreatePlayerWithRatio()
  {
    $playerName = 'Player1';
    $playerRatio = 350;
    $player = new Player($playerName, $playerRatio );
    $this->assertInstanceOf(Player::class,$player);

    $this->assertEquals($playerName, $player->getName());
    $this->assertEquals($playerRatio, $player->getRatio());
  }

  public function testUpdatePlayerRatio()
  {
    $playerName1 = 'Player1';
    $playerRatio1 = 350;
    $playerName2 = 'Player2';
    $playerRatio2 = 400;

    $player = new Player($playerName1, $playerRatio1 );
    $this->assertInstanceOf(Player::class,$player);

    $opponent = new Player($playerName2, $playerRatio2);
    $player->updateRatioAgainst($opponent, 1);

    $this->assertEquals(368, round($player->getRatio()));
  }
}