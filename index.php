<?php
require_once 'matchmaker.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MatchMaker</title>
</head>

<body>
  <h1>Welcome to matchmaker</h1>
  <h2>All Players</h2>
  <ul>
    <?php foreach ($lobby->queuingPlayers as $player): ?>
      <li>
        Name: <?php echo htmlspecialchars($player->getName(), ENT_QUOTES, 'UTF-8'); ?><br>
        Ratio: <?php echo htmlspecialchars($player->getRatio(), ENT_QUOTES, 'UTF-8'); ?><br>
      </li>
    <?php endforeach; ?>
  </ul>

  <h2>MatchMaker Results</h2>
  <p>Opponents for <?php echo htmlspecialchars($lobby->queuingPlayers[0]->getName(), ENT_QUOTES, 'UTF-8'); ?>:</p>
  <ul>
    <?php foreach ($opponents as $opponent): ?>
      <li><?php echo htmlspecialchars($opponent->getName(), ENT_QUOTES, 'UTF-8'); ?></li>
    <?php endforeach; ?>
  </ul>
</body>

</html>