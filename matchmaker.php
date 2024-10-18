<?php

/*
 * This file is part of the OpenClassRoom PHP Object Course.
 *
 * (c) Grégoire Hébert <contact@gheb.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

spl_autoload_register(static function (string $fqcn): void {
  $path = sprintf('%s.php', str_replace(['App', '\\'], ['src', '/'], $fqcn));
  require_once $path;
});

use App\MatchMaker\Lobby;
use App\MatchMaker\Player\Player;

$playerNames = ['greg', 'jade', 'alice', 'bob', 'charlie'];
shuffle($playerNames);

$lobby = new Lobby();
foreach ($playerNames as $name) {
  $ratio = rand(300, 500); // Generate a random ratio between 300 and 500
  $lobby->addPlayer(new Player($name, $ratio));
}

$opponents = $lobby->findOponents($lobby->queuingPlayers[0]);

// Pass the necessary data to the template
$playerName = htmlspecialchars($lobby->queuingPlayers[0]->getName(), ENT_QUOTES, 'UTF-8');
$opponentsList = array_map(function ($opponent) {
  return htmlspecialchars($opponent->getName(), ENT_QUOTES, 'UTF-8');
}, $opponents);
