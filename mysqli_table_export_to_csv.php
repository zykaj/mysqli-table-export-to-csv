<?php

// db connection function
function dbConnection(){
    $servername = "localhost";
    $username = "database_username";
    $password = "database_password";
    $dbname = "database_tablename";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

// call export function
exportMysqlToCsv('fixedfares.csv');


// export csv
function exportMysqlToCsv($filename = 'fixedfares.csv')
{

   $conn = dbConnection();
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql_query = "SELECT id, departure, destination, saloon, estate, mpv5, mpv8, executive, minibus, type FROM fixedfares";

    // Gets the data from the database
    $result = $conn->query($sql_query);

    $f = fopen('php://temp', 'wt');
    $first = true;
    while ($row = $result->fetch_assoc()) {
        if ($first) {
            fputcsv($f, array_keys($row));
            $first = false;
        }
        fputcsv($f, $row);
    } // end while

    $conn->close();

    $size = ftell($f);
    rewind($f);

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: $size");
    // Output to browser with appropriate mime type, you choose ;)
    header("Content-type: text/x-csv");
    header("Content-type: text/csv");
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=$filename");
    fpassthru($f);
    exit;

}


?>