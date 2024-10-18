<?php declare(strict_types=1);

namespace App\Tests\MatchMaker;

use PHPUnit\Framework\TestCase;
use App\MatchMaker\Lobby;
use App\MatchMaker\Player\Player;
use App\MatchMaker\Player\QueuingPlayer;

class MatchMakerTest extends TestCase
{

  /** @var Lobby */
  private $lobby;

  /** @var array */
  private $playerNames = ['greg', 'jade', 'alice', 'bob', 'charlie'];

  protected function setUp(): void
  {
    $this->lobby = new Lobby();
    foreach ($this->playerNames as $name) {
      $ratio = rand(300, 500);
      $this->lobby->addPlayer(new Player($name, $ratio));
      //$this->lobby->addPlayer(new Player($name));

    }
  }

  public function testPlayersAreAddedToLobby(): void
  {
    $this->assertCount(5, $this->lobby->queuingPlayers);
    foreach ($this->playerNames as $name) {
      $this->assertContains($name, array_map(function ($player) {
        return $player->getName();
      }, $this->lobby->queuingPlayers));
    }
  }

  public function testFindOponentsReturnsCorrectOpponents(): void
  {
    $firstPlayer = $this->lobby->queuingPlayers[0];
    $opponents = $this->lobby->findOponents($firstPlayer);

    $this->assertIsArray($opponents);
    $this->assertNotEmpty($opponents);
    foreach ($opponents as $opponent) {
      $this->assertInstanceOf(QueuingPlayer::class, $opponent);
      $this->assertNotEquals($firstPlayer->getName(), $opponent->getName());
    }
  }
}
