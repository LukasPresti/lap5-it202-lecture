<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Unit 7 Exercise lap5</title>
</head>
<body>
<h1>My Golfing Team</h1>
<h4>Name: Lukas Presti</h4>
<h4>UCID: lap5</h4>
<h4>Course and Section: IT-202-005 Internet Applications</h4>
<?php

$db = getDB();
$golferid = $_GET['golferid'];


$query = "SELECT * FROM games 
          JOIN golfers ON games.golferid = golfers.golferid 
          WHERE games.golferid = $golferid";


$result = $db->query($query);

if ($result == false) {
  echo "ERROR: " . $db->errno . ' ' . $db->error;
}

$db->close();

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_array(MYSQLI_ASSOC);
?>
  <p><u><b>Golfer Information</b></u><br>
    ID: <?php echo $row['golferid']; ?><br>
    Name: <?php echo $row['name']; ?><br>
    Address: <?php echo $row['address']; ?><br>
    Phone Number: <?php echo $row['phone']; ?></p>

  <table border="1" cellpadding="5">
    <caption style="white-space: nowrap;"><u><b>Game Information</b></u></caption>
    <tr>
      <th>Game</th>
      <th>Score</th>
    </tr>
    <?php
    do {
    ?>
      <tr>
        <td><?php echo $row['gameid']; ?></td>
        <td><?php echo $row['score']; ?></td>
      </tr>
    <?php
    } while ($row = $result->fetch_array(MYSQLI_ASSOC));
    ?>
  </table>
<?php
} else {
  echo "<h2>There are no scores for this golferid</h2>\n";
}

if ($result) {
  echo "<h2>New game's score successfully displayed</h2>\n";
} else {
  echo "<h2>Sorry, there was a problem displaying that golfer's games</h2>\n";
}

date_default_timezone_set("America/New_York");
echo "The date and time is " . date("D M j h:i:sa T Y");
?>
</body>
</html>
