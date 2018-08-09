<?php

class MysqliProcess {
    private $conn;
    function __construct($host, $userName, $pwd, $dbName){
        $conn = mysqli_connect($host, $userName, $pwd, $dbName);
        mysqli_set_charset($conn, 'utf8');
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->conn = $conn;
    }
    function queryData($sql){
        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            die("Query data failed：" . mysqli_error($this->conn));
        }
        $results = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($results, $row);
        }
        mysqli_close($this->conn);
        return $results;
    }
    function updateData($sql){
        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            die("Update data failed：" . mysqli_error($this->conn));
        }
        mysqli_close($this->conn);
    }
    function deleteData($sql){
        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            die("Delete data failed：" . mysqli_error($this->conn));
        }
        mysqli_close($this->conn);
    }
    function insertData($sql){
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Insert data failed：" . mysqli_error($this->conn));
        }
        mysqli_close($this->conn);
    }
}