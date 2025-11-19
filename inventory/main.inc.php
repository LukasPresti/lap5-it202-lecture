<?php
// Make sure the session is started before using $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    // Not logged in → show login form
    ?>
    <h2>Please log in</h2><br>
    <form name="login" action="index.php" method="post">
        <label>Email:</label>
        <input type="text" name="emailAddress" size="20">
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" size="20">
        <br><br>
        <input type="submit" value="Login">
        <input type="hidden" name="content" value="validate">
    </form>
    <?php
} else {
    // Logged in → show welcome message
    echo "<h2>Welcome to Inventory Helper, {$_SESSION['login']}</h2>";
    ?>
    <br><br>
    <p>This program tracks category and item inventory</p>
    <p>Please use the links in the navigation window</p>
    <p>Please DO NOT use the browser navigation buttons!</p>
    <a href="index.php?content=logout"><strong>Logout</strong></a>
    <?php
}
?>
