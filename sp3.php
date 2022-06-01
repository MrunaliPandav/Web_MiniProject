<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "Mrunali_2805";
$dbname = "myDB";
// Create connection
$conn = mysqli_connect($servername,
$username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " .
mysqli_connect_error());
} 
echo "User Data Information";
echo "<br>";
$sql = "CREATE TABLE MyGuests2(
    id INT(6) UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    if (mysqli_query($conn, $sql)) {
        echo "<br>";
    echo "Table MyGuests2 created
    successfully";
    echo "<br>";
    } else {
    echo "Error creating table: " .
    mysqli_error($conn);
    }
    $sql = "INSERT INTO MyGuests2 (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
echo "<br>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$sql = "SELECT id, firstname, lastname FROM MyGuests2";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "id: " . $row["id"]. " - Name: " .
$row["firstname"]. " " . $row["lastname"]. "<br>";
echo "<br>";
}
} else {
echo "0 results";
}
$sql = "DELETE FROM MyGuests2 WHERE id=3";
if (mysqli_query($conn, $sql)) {
echo "Record deleted successfully";
echo "<br>";
} else {
echo "Error deleting record: " .
mysqli_error($conn);
}




    mysqli_close($conn);
?>