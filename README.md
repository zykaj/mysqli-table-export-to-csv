# mysqli-table-export-to-csv
Export database table records from mysqli to csv using php

This php code will make possible to export some records from database table, with mysqli and php.

You need to change the database connection username/password/tablename
    $servername = "localhost";
    $username = "database_username";
    $password = "database_password";
    $dbname = "database_tablename";

Once you done, you need to change also the database query in order to be the same as you databese table

$sql_query = "SELECT id, departure, destination, saloon, estate, mpv5, mpv8, executive, minibus, type FROM fixedfares";


* this is a very basic example, just to give you the idea how it works.

Enjoy!

