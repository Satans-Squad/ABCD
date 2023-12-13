<html>

<?php 
  $servername = "172.17.0.2";
  $username = "root";
  $password = "mypass";
  $dbname = "mydb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "CREATE TABLE IF NOT EXISTS records (prn INT, name TEXT)";

  if ($conn->query($sql) === TRUE) {
    echo "Table records created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $prn = $_POST["prn"];

    $sql = "INSERT INTO records VALUES ('$prn', '$name')";

    if ($conn->query($sql) === TRUE) {
      echo "Data Inserted Successfully";
    } else {
      echo "Error in Data Insertion: " . $conn->error;
    }

}

?>

  <body>

  <form action="index.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="prn">PRN:</label>
        <input type="number" id="prn" name="prn" required><br><br>

        <input type="submit" value="Submit">
    </form>
    
  </body>

</html>



<?php

$sql = "SELECT * FROM records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "PRN: " . $row["prn"]. " - Name: " . $row["name"]. "<br>";
  }
} else {
  echo "0 results";
}
?>