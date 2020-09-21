<?php

    include('../includes/dbcon.php');

	//get employees
    $sql = "SELECT * FROM blacklist WHERE status='active'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    header('Content-Type: application/json');

    echo json_encode($result);

 ?>