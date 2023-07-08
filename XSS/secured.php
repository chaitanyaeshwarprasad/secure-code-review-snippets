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
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);

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

/* 
The function test_input($data) is a helper function commonly used in web development to sanitize user input. It takes a string $data as input and performs several operations to remove any unwanted characters and protect against potential security vulnerabilities. Here's a breakdown of what each line does:

$data = trim($data);The trim() function removes any leading and trailing whitespace from the string. This is useful to eliminate unnecessary spaces that users might accidentally include.
$data = stripslashes($data);

The stripslashes() function removes backslashes () from the string. Backslashes are often used to escape certain characters, but they may not be necessary or desired in all cases. This step ensures that the input is free from unnecessary backslashes.
$data = htmlspecialchars($data);

The htmlspecialchars() function converts special characters to their respective HTML entities. This is important for preventing cross-site scripting (XSS) attacks, where an attacker may inject malicious code into the webpage by submitting input containing HTML or JavaScript tags. Converting special characters to HTML entities ensures that the input is displayed as plain text on the webpage, preventing the execution of any embedded scripts.
return $data;

The sanitized string is then returned from the function to be used further in the code.
By applying these operations, the test_input() function helps improve the security and integrity of user input by removing unnecessary whitespace, backslashes, and converting special characters to their HTML entities. It is a good practice to use such sanitization functions to protect against common vulnerabilities and ensure the reliability of user input.
*/

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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