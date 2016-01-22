<?php
/**
 * Created by PhpStorm.
 * User: andreas
 * Date: 10-11-2014
 * Time: 15:48
 */

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    //display index
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "m_klub";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE m_klub SET kalender_content='Doe' WHERE id=2";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>