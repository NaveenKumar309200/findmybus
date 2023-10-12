<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the value of the "output" parameter from the form
    $output = $_POST["output"];

    // Perform necessary sanitization or validation on the $output variable if required

    // Debugging statement
    echo "Form input: " . $output . "<br>";

    // Connect to the database
    $servername = "localhost";
    $username = "id20893135_root";
    $password = "Mersalnavi@007";
    $dbname = "id20893135_project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query
    $sql = "SELECT distinct busname, arrival, depature FROM bus WHERE stop = '$output' OR route = '$output'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was executed successfully
    if ($result === false) {
        // Display the error message
        echo "Error executing the query: " . $conn->error;
        // You can also consider logging the error for further investigation
    } else {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through the rows and output the data
            while ($row = $result->fetch_assoc()) {
                // Access the columns of each row using the column names
                $busName = $row["busname"];
                $arrival = $row["arrival"];
                $depature = $row["depature"];

                // Do something with the retrieved data (e.g., display it)
                echo "Bus Name: $busName, Arrival: $arrival, Departure: $depature<br>";
            }
        } else {
            echo "No results found.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>
