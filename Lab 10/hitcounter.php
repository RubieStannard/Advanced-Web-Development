<?php
class HitCounter { // start the Hit Counter class
    private $conn; // Private properties can only be used by the class in which the property or method was defined
    function __construct($host, $user, $pswd, $dbnm) { // constructor allows you to initialize an object's properties upon creation of the object. PHP will automatically call this function when you create an object from a class
        $this->conn = new mysqli($host, $user, $pswd, $dbnm); // database connection - $this refers to the current object and is only available inside methods
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        // $query1 = "SELECT * FROM hitcounter";
        // $result = $this->conn->query($query1);
        // if ($result && $result->num_rows > 0) {
        //     $row = $result->fetch_assoc();
        //     $this->hitCount = $row["hits"];
        // } else {
        //     $this->hitCount = 0;
        // }
    }
}

function getHits() { // get and display hits on the page
    $query2 = "SELECT hits FROM hitcounter";
    $results = $this->conn->query($query2);
    if ($results->num_rows > 0) {
        $row = $results->mysqli_fetch_assoc(); // function fetches a result row as an associative array
        $hits = $row["hits"];
        echo "<p>Hits: $hits</p>";
    } else {
        echo "<p>Hits: 0/p>";
    }
}

function setHits() {
    $query3 = "UPDATE hitcounter SET hits = $hits"; // add one to hits and update the table
    $this->conn->query($query3);
}

function closeConnection() { // close connection 
    $this->conn->close();
}

function startOver() {
    $query4 = "UPDATE hitcounter SET hits = 0"; // set hits to zero
    $this->conn->query($query4);
}
?>