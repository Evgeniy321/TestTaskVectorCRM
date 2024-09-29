<?php
include('connection.php');
header('Content-Type: application/json; charset=utf-8');
$transaction = execute('SELECT
id,
user_id,
date,
SUM(amount) OVER (PARTITION BY user_id ORDER BY date, id) AS balance
FROM transactions ORDER BY date, id');
var_dump($transaction);
?>