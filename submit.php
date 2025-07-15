<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Gets the text entered by user
    $username = trim($_POST["username"]);
    $plotChoice = trim($_POST["plotChoice"]);

    $safeUsername = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $safePlot = htmlspecialchars($plotChoice, ENT_QUOTES, 'UTF-8');

    // Prints the current date that the entry was generated
    $date = date("n/j/Y");

    // Formats the entry to this: 6/26/2025 Username: ... | Plot Choice: ...
    $entry = $date . " Username: " . $safeUsername . " | Plot Choice: " . $safePlot . PHP_EOL;

    // File path
    $file = __DIR__ . "/plotrequests.txt";
    file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);
}
?>
<!DOCTYPE html>
<html>
<head><title>Submitted</title></head>
<h1>Request Submitted</h1>
<body>
  <p>Thanks! Please wait 1-2 days for your request to be processed, Welcome to Ruby.</p>
</body>
</html>

<!-- I am not aware of how to use PHP, so this file was not changed. -->
