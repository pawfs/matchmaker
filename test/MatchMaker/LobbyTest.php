<?php declare(strict_types=1);

namespace App\Tests\MatchMaker;

use PHPUnit\Framework\TestCase;
use App\MatchMaker\Lobby;
use App\MatchMaker\Player\Player;
use App\MatchMaker\Player\QueuingPlayer;

class LobbyTest extends TestCase
{
  public function testCreateLobby()
  {
    $lobby = new Lobby();
    $this->assertInstanceOf(Lobby::class, $lobby);
  }

  public function testJoinLobby()
  {
    $lobby = new Lobby();
    $player = new Player('Player1');
    $lobby->addPlayer($player);

    $this->assertCount(1, $lobby->queuingPlayers);
  }

  public function testStartGame()
  {
    $lobby = new Lobby();
    $player1 = new Player('Player1');
    $player2 = new Player('Player2');
    $lobby->addPlayers($player1, $player2);

    $opponents = $lobby->findOponents($lobby->queuingPlayers[0]);

    $this->assertNotEmpty($opponents);
  }

  public function testFindOponents()
  {
    $lobby = new Lobby();
    $player1 = new Player('Player1');
    $player2 = new Player('Player2');
    $player3 = new Player('Player3');
    $lobby->addPlayers($player1, $player2, $player3);

    $opponents = $lobby->findOponents($lobby->queuingPlayers[0]);

    $this->assertNotEmpty($opponents);
    $this->assertContainsOnlyInstancesOf(QueuingPlayer::class, $opponents);
  }

  public function testAddMultiplePlayers()
  {
    $lobby = new Lobby();
    $player1 = new Player('Player1');
    $player2 = new Player('Player2');
    $player3 = new Player('Player3');
    $lobby->addPlayers($player1, $player2, $player3);

    $this->assertCount(3, $lobby->queuingPlayers);
  }


  }



