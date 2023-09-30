<?php 
require('../config/database.php');


$request = $_POST['Request'];
if ($request == 'Region'){
    $JSON_REGION = array();
    $sql = "SELECT * FROM ph_region";
    $result = $conn->query($sql);
    while ($reg = $result->fetch_assoc()) {
        $JSON_REGION[] = array(
            'id' => $reg['psgcCode'],
            'name' => $reg['regDesc'],
            'code' => $reg['regCode']
        );
    }
    echo json_encode($JSON_REGION, JSON_PRETTY_PRINT);
}