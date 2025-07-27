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
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plot Claim Form</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(#111, #333), url('/assets/background.png') no-repeat center center fixed;
      background-blend-mode: overlay;
      background-size: cover;
      color: #eee;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container1 {
      max-width: 500px;
      background: rgba(25,25,25,0.85);
      padding: 40px 30px;
      border-radius: 14px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.3);
      backdrop-filter: blur(5px);
    }
    button {
      padding: 12px;
      background-color: #0fae88;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      color: #fff;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #0c9874;
    }

    @media (max-width: 500px) {
      .container {
        padding: 25px 15px;
      }
    }
  </style>
</head>
<body>
  <div class="container1">
    <form method="POST" action="/submit.php">
      <p style="text-align: center;"></p>
      <button type="submit">Thanks! Click me to return to the website.</button>
    </form>
  </div>
</body>
</html>