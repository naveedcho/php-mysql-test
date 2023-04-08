<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    
    if ($conn->connect_error) die("Fatal error");

    $query = 'SELECT * FROM `Books`';
    $result = $conn->query($query);
    if (!$result) die("Fatal error");

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; $j++){
        $result->data_seek($j);
        echo 'Title: '.htmlspecialchars($result->fetch_assoc()['NAME']).'<br>';
        echo 'Price: '.htmlspecialchars($result->fetch_assoc()['COST_PER_UNIT']).'<br>';
        echo 'Units: '.htmlspecialchars($result->fetch_assoc()['QUANTITY']).'<br>'.'<br>';
    }

    $result->close();
    $conn->close();
?>