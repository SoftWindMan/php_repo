<?php

class MysqliObject{
    private $conn;

    function __construct($host, $userName, $pwd, $dbName){
        $conn = new mysqli($host, $userName, $pwd, $dbName);
        $conn->set_charset('utf8');
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }

    function queryData($sql){
        $result = $this->conn->query($sql);
        if(!$result){
            die("Query data failed: " . $this->conn->error);
        }

        $results = array();
        while($row = $result->fetch_assoc()){
            array_push($results, $row);
        }
        return $results;
    }

    function updateData($sql){
        $result = $this->conn->query($sql);
        if(!$result){
            die("Update data failed: " . $this->conn->error);
        }
    }

    function deleteData($sql){
        $result = $this->conn->query($sql);
        if(!$result){
            die("Delete data failed: " . $this->conn->error);
        }
    }

    function insertData($sql){
        $result = $this->conn->query($sql);
        if(!$result){
            die("Insert data failed: " . $this->conn->error);
        }
    }

    function closeDatabase() {
        $this->conn->close();
    }
}