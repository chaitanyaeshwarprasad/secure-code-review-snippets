<!DOCTYPE html>
<html>
<head>
  <title>Form Submission</title>
</head>
<body>

<?php
// define variables and set to empty values
$name = $email = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = ($_POST["name"]);
  $email = ($_POST["email"]);
  $website = ($_POST["website"]);
  $comment = ($_POST["comment"]);

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "xssacep";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert data into the database
  $sql = "INSERT INTO xssacep (name, email, website, comment) VALUES ('$name', '$email', '$website', '$comment')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

?>

<h2>Form Submission</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="name">Name:</label>
  <input type="text" name="name" required><br><br>

  <label for="email">Email:</label>
  <input type="email" name="email" required><br><br>

  <label for="website">Website:</label>
  <input type="text" name="website" required><br><br>

  <label for="comment">Comment:</label>
  <textarea name="comment" rows="5" required></textarea><br><br>

  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
